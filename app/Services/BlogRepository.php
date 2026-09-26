<?php

namespace App\Services;

use App\Models\BlogPost;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

/**
 * Single entry point for blog data.
 *
 *   config('blog.driver') = 'file'      → config/blog.php + resources/content/blog/{slug}.html
 *   config('blog.driver') = 'database'  → blog_posts table (App\Models\BlogPost)
 *
 * Views and controller don't care which one is active.
 * Posts are returned as arrays (file) or models (database); both support $post['key'].
 */
class BlogRepository
{
    private ?Collection $fileCache = null;

    public function usesDatabase(): bool
    {
        return config('blog.driver') === 'database';
    }

    /** Published posts for the listing page, newest first. */
    public function paginate(?string $category, int $perPage, string $path, array $query = []): LengthAwarePaginator
    {
        if ($this->usesDatabase()) {
            return BlogPost::published()
                ->select(BlogPost::CARD_COLUMNS)
                ->when($category, fn ($q) => $q->where('category', $category))
                ->latest('published_at')
                ->paginate($perPage)
                ->withQueryString();
        }

        $items = $this->filePosts()
            ->when($category, fn ($c) => $c->where('category', $category))
            ->values();

        $page = LengthAwarePaginator::resolveCurrentPage();

        return new LengthAwarePaginator(
            $items->forPage($page, $perPage)->values(),
            $items->count(),
            $perPage,
            $page,
            ['path' => $path, 'query' => $query]
        );
    }

    /** Distinct categories that have at least one published post. */
    public function categories(): Collection
    {
        if ($this->usesDatabase()) {
            return BlogPost::published()->select('category')->distinct()->orderBy('category')->pluck('category');
        }

        return $this->filePosts()->pluck('category')->unique()->sort()->values();
    }

    /** One published post by slug, or null. */
    public function find(string $slug): mixed
    {
        if ($this->usesDatabase()) {
            return BlogPost::published()->where('slug', $slug)->first();
        }

        return $this->filePosts()->firstWhere('slug', $slug);
    }

    /** Up to $limit other posts: same category first, then newest. */
    public function related(mixed $post, int $limit = 2): Collection
    {
        if ($this->usesDatabase()) {
            return BlogPost::published()
                ->select(BlogPost::CARD_COLUMNS)
                ->whereKeyNot($post->getKey())
                ->orderByRaw('CASE WHEN category = ? THEN 0 ELSE 1 END', [$post->category])
                ->latest('published_at')
                ->take($limit)
                ->get();
        }

        return $this->filePosts()
            ->where('slug', '!=', $post['slug'])
            ->sortBy(fn ($p) => $p['category'] === $post['category'] ? 0 : 1) // stable: keeps newest-first within groups
            ->take($limit)
            ->values();
    }

    /*
    |--------------------------------------------------------------------------
    | File driver
    |--------------------------------------------------------------------------
    */
    private function filePosts(): Collection
    {
        if ($this->fileCache) {
            return $this->fileCache;
        }

        $dir = config('blog.content_path', resource_path('content/blog'));
        $now = now();

        return $this->fileCache = collect(config('blog.posts', []))
            ->map(function (array $p, string $slug) use ($dir) {
                $file = "{$dir}/{$slug}.html";
                if (! is_file($file)) {
                    Log::warning("Blog post '{$slug}' hidden: body file not found at {$file}");
                    return null;
                }

                $body = file_get_contents($file);
                $text = trim(preg_replace('/\s+/u', ' ', strip_tags($body)));
                $words = count(preg_split('/\s+/u', $text, -1, PREG_SPLIT_NO_EMPTY));
                $excerpt = $p['excerpt'] ?? Str::limit($text, 160);

                // Same fields/defaults as the blog_posts table
                return [
                    'slug' => $slug,
                    'title' => $p['title'],
                    'category' => $p['category'] ?? 'General',
                    'excerpt' => $excerpt,
                    'body' => $body,
                    'image' => $p['image'] ?? null,
                    'author' => $p['author'] ?? null,
                    'meta_title' => $p['meta_title'] ?? null,
                    'description' => $p['description'] ?? Str::limit($excerpt, 155),
                    'faqs' => $p['faqs'] ?? [],
                    'cta' => $p['cta'] ?? null,
                    'read_minutes' => $p['read_minutes'] ?? max(1, (int) ceil($words / 200)),
                    'status' => $p['status'] ?? 'published',
                    'published_at' => Carbon::parse($p['published_at'] ?? 'now'),
                ];
            })
            ->filter()
            ->filter(fn ($p) => $p['status'] === 'published' && $p['published_at']->lte($now))
            ->sortByDesc(fn ($p) => $p['published_at']->timestamp)
            ->values();
    }
}
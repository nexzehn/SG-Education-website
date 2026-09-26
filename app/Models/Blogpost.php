<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    use SoftDeletes;

    public const STATUS_DRAFT = 'draft';
    public const STATUS_PUBLISHED = 'published';

    /** Columns needed for cards (listing / related) — skips the heavy body. */
    public const CARD_COLUMNS = [
        'id', 'title', 'slug', 'category', 'excerpt', 'image', 'read_minutes', 'published_at',
    ];

    protected $table = 'blog_posts';

    protected $fillable = [
        'title', 'slug', 'category', 'excerpt', 'body', 'image', 'author',
        'meta_title', 'description', 'faqs', 'cta', 'read_minutes',
        'status', 'published_at',
    ];

    protected $casts = [
        'faqs' => 'array',
        'cta' => 'array',
        'read_minutes' => 'integer',
        'published_at' => 'datetime',
    ];

    protected $attributes = [
        'status' => self::STATUS_DRAFT,
    ];

    /*
    |--------------------------------------------------------------------------
    | Auto-fill on every save (works the same for seeder and future admin panel)
    |--------------------------------------------------------------------------
    */
    protected static function booted(): void
    {
        static::saving(function (BlogPost $post) {
            if (blank($post->slug)) {
                $post->slug = static::uniqueSlug($post->title, $post->id);
            }

            $text = trim(preg_replace('/\s+/u', ' ', strip_tags((string) $post->body)));

            if ($post->isDirty('body') || ! $post->read_minutes) {
                $words = count(preg_split('/\s+/u', $text, -1, PREG_SPLIT_NO_EMPTY));
                $post->read_minutes = max(1, (int) ceil($words / 200));
            }

            if (blank($post->excerpt)) {
                $post->excerpt = Str::limit($text, 160);
            }

            if (blank($post->description)) {
                $post->description = Str::limit($post->excerpt, 155);
            }

            if ($post->status === self::STATUS_PUBLISHED && ! $post->published_at) {
                $post->published_at = now();
            }
        });
    }

    /** Only live posts: status published and publish time reached (future = scheduled). */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_PUBLISHED)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    public static function uniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($title) ?: 'post';
        $slug = $base;
        $i = 2;

        while (static::withTrashed()
            ->where('slug', $slug)
            ->when($ignoreId, fn ($q) => $q->whereKeyNot($ignoreId))
            ->exists()) {
            $slug = "{$base}-{$i}";
            $i++;
        }

        return $slug;
    }
}
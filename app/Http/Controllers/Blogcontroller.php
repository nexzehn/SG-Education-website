<?php

namespace App\Http\Controllers;

use App\Services\BlogRepository;
use Illuminate\Http\Request;

/**
 * Data source is chosen in config/blog.php ('driver' => 'file' | 'database').
 * This controller never needs to change when you switch.
 */
class BlogController extends Controller
{
    public function __construct(private BlogRepository $blog)
    {
    }

    /** /blog  and  /blog?category=JEE */
    public function index(Request $request)
    {
        $category = $request->query('category');

        $posts = $this->blog->paginate(
            $category,
            (int) config('blog.per_page', 12),
            $request->url(),
            $request->query()
        );

        $categories = $this->blog->categories();

        return view('blog.index', compact('posts', 'categories', 'category'));
    }

    /** /blog/{slug} */
    public function show(string $slug)
    {
        $post = $this->blog->find($slug);

        abort_unless($post, 404);

        $related = $this->blog->related($post);

        return view('blog.show', compact('post', 'related'));
    }
}
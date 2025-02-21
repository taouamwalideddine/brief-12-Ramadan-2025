<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->is('experiences') ? 'experience' : 'recipe';
        $category = $request->query('category');
        
        $posts = Post::where('type', $type)
            ->when($category, function($query) use ($category) {
                $query->whereHas('category', fn($q) => $q->where('slug', $category));
            })
            ->with(['category', 'comments'])
            ->latest()
            ->paginate(10);

        return view('posts.index', compact('posts', 'type'));
    }

    public function create()
    {
        $type = request()->query('type');
        $categories = Category::all();
        return view('posts.create', compact('type', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'type' => 'required|in:experience,recipe',
            'category_id' => 'nullable|exists:categories,id'
        ]);

        Post::create($request->all());

        // Fixed the redirect line
        return redirect()->route($request->type === 'experience' ? 'experiences' : 'recipes')
            ->with('success', 'Publication créée avec succès!');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function modal(Post $post)
    {
        $post->load('comments'); // Eager load comments
        return view('posts.modal', compact('post'));
    }

    public function getStatistics()
    {
     $stats = [
         'experiences' => Post::where('type', 'experience')->count(),
         'recipes' => Post::where('type', 'recipe')->count(),
         'total_posts' => Post::count(),
        ];

     return $stats;
    }
}
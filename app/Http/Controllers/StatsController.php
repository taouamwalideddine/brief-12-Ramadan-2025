<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

class StatsController extends Controller
{
    public function index()
    {
        $stats = [
            'total_posts' => Post::count(),
            'total_recipes' => Post::where('type', 'recipe')->count(),
            'total_users' => User::count(),
            'popular_recipes' => Post::withCount('likes')
                ->where('type', 'recipe')
                ->orderByDesc('likes_count')
                ->take(5)
                ->get()
        ];
        
        return view('stats', compact('stats'));
    }
}
<?php
namespace App\Http\Middleware;

use App\Models\Post;
use Closure;
use Illuminate\Http\Request;

class ShareStatistics
{
    public function handle(Request $request, Closure $next)
    {
        $stats = [
            'experiences' => Post::where('type', 'experience')->count(),
            'recipes' => Post::where('type', 'recipe')->count(),
            'total_posts' => Post::count(),
        ];

        // Share statistics with all views
        view()->share('stats', $stats);

        return $next($request);
    }
}
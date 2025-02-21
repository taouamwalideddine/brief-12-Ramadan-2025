<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

// Homepage
use App\Models\Post;

Route::get('/', function () {
    // Fetch statistics
    $stats = [
        'experiences' => Post::where('type', 'experience')->count(),
        'recipes' => Post::where('type', 'recipe')->count(),
        'total_posts' => Post::count(),
    ];

    // Pass statistics to the welcome view
    return view('welcome', compact('stats'));
})->name('welcome');

// Posts
Route::resource('posts', PostController::class)->except(['index']);
Route::get('/experiences', [PostController::class, 'index'])->name('experiences');
Route::get('/recettes', [PostController::class, 'index'])->name('recipes');
Route::get('/posts/{post}/modal', [PostController::class, 'modal'])->name('posts.modal');

// Comments
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
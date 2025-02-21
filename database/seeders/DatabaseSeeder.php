<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;

 function run()
{
    Category::create(['name' => 'Entrées', 'slug' => 'entrees']);
    Category::create(['name' => 'Plats', 'slug' => 'plats']);
    Category::create(['name' => 'Desserts', 'slug' => 'desserts']);

    Post::factory()->count(10)->create();
}
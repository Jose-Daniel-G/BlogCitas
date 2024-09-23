<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        Storage::deleteDirectory('posts');
        Storage::makeDirectory('posts');

        $this->call([RoleSeeder::class, 
                        // CursoSeeder::class,
                        UserSeeder::class,
                        CategorySeeder::class,
                        // VehiculoSeeder::class,
                    ]);//  TagSeeder::class,  
        // Category::factory(4)->create();

        Tag::factory(8)->create();
        $this->call(PostSeeder::class);
    }
}

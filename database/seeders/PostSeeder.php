<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {

        // Crear 7 posts adicionales con imágenes asignadas manualmente
        for ($i = 0; $i < 7; $i++) {
            $post = Post::factory()->create(); // Crear el post

            // Aquí puedes asignar una imagen manualmente
            $imagePath = 'favicons/images/' . $i+1 . '.jpg'; // Ruta personalizada de tu imagen
            Image::create([
                'url' => $imagePath,
                'imageable_id' => $post->id,
                'imageable_type' => Post::class,
            ]);

            // Asignar etiquetas al post
            $post->tags()->attach([
                rand(1, 4),
                rand(5, 8),
            ]);
        }
        $posts = Post::factory(5)->create();

        foreach ($posts as $post) {

            Image::factory(1)->create([
                'imageable_id' => $post->id,
                'imageable_type' => Post::class,
            ]);

            $post->tags()->attach([
                rand(1, 4),
                rand(5, 8),
            ]);
        }
    }
}

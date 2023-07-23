<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Url;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        User::factory()->create([
            'name' => 'Bablu Mia',
            'email' => 'mdbablu22.bablu22@gmail.com',
        ]);

        // \App\Models\Url::factory(10)->create();
        Url::create([
            'url' => 'https://laravel.com',
            'active' => true,
        ]);
        Url::create([
            'url' => 'https://facebook.com',
            'active' => true,
        ]);
        Url::create([
            'url' => 'https://google.com',
            'active' => true,
        ]);
        Url::create([
            'url' => 'https://twitter.com',
            'active' => true,
        ]);
        Url::create([
            'url' => 'https://youtube.com/docs',
            'active' => true,
        ]);
        Url::create([
            'url' => 'https://bablumia.info',
            'active' => true,
        ]);
    }
}
<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Post::factory(20)->create();

        User::create([
            'name' => 'James Clight',
            'username' => 'Clight',
            'email' => 'wowman1819@gmail.com',
            'password' => bcrypt('password')
        ]);



       User::factory(3)->create();

    

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming',
        ]);


        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);

        
    }
}

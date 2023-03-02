<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Material::insert(
            [
                ['name' => 'satan'],
                ['name' => 'beads'],
                ['name' => 'melton'],
                ['name' => 'jeans'],
                ['name' => 'fabric'],
                ['name' => 'bolester']
            ]
        );

        \App\Models\Color::insert([
            ['code' => '#f00', 'key' => 'red', 'display_name' => 'Red'],
            ['code' => '#00f', 'key' => 'blue', 'display_name' => 'Blue'],
            ['code' => '#0f0', 'key' => 'green', 'display_name' => 'Green'],
            ['code' => '#000', 'key' => 'black', 'display_name' => 'Black'],
            ['code' => '#fff', 'key' => 'white', 'display_name' => 'White']
        ]);

        \App\Models\User::updateOrCreate([
                'email' => 'ahmed5000hazem@gmail.com'
            ],
            [
            'firstname' => 'Ahmed',
            'lastname' => 'Hazem',
            'phone' => '01121143200',
            'email' => 'ahmed5000hazem@gmail.com',
            'password' => bcrypt('123456')
        ]);

        \App\Models\Category::factory(10)->create();
        \App\Models\User::factory(500)->create();
        \App\Models\Product::factory(50000)->create();
    }
}

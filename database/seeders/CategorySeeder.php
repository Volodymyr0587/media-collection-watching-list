<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first(); // Assuming you have at least one user in the database

        Category::create([
            'name' => 'Movies',
            'user_id' => $user->id,
        ]);

        Category::create([
            'name' => 'Serials',
            'user_id' => $user->id,
        ]);

        Category::create([
            'name' => 'Anime',
            'user_id' => $user->id,
        ]);
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $test_user = \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $anon_user = \App\Models\User::factory()->create([
            'name' => 'Anonymous User',
            'email' => 'anon@example.com',
        ]);

        $categories = ['meal', 'bus', 'drink', 'health', 'raw food', 'phone bill'];
        foreach($categories as $category) {
            $test_user->categories()->create([
                'name' => $category
            ]);
        }

        $anon_user->categories()->create(
            ['name' => 'Books']
        );
    }
}

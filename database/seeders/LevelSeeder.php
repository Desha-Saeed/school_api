<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            ['name' => 'level1', 'code' => 1, 'description' => 'Description for level1'],
            ['name' => 'level2', 'code' => 2, 'description' => 'Description for level2'],
            ['name' => 'level3', 'code' => 3, 'description' => 'Description for level3'],
            ['name' => 'level4', 'code' => 4, 'description' => 'Description for level4'],
        ];

        foreach ($levels as $level) {
            Level::create([
                'name' => $level['name'],
                'number' => $level['code'],
                'description' => $level['description'],
            ]);
        }
    }
}

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
        $this->call(LevelSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(CourseSeeder::class);


        $this->call(GradeItemSeeder::class);
        $this->call(EnrollmentSeeder::class);
        $this->call(StudentGradeSeeder::class);
    }
}

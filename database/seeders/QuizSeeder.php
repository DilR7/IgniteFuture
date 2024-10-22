<?php

namespace Database\Seeders;

use App\Models\Quiz;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Quiz::create([
            'title' => 'Introduction to Programming Quiz',
            'quiz_desc' => 'A quiz covering the basics of programming from the Introduction to Programming.', 
            'score' => 0, 
            'userID' => 1, 
        ]);

        Quiz::create([
            'title' => 'Advanced Laravel Quiz', 
            'quiz_desc' => 'An advanced quiz focusing on Laravel framework concepts and practices.', 
            'score' => 0, 
            'userID' => 2, 
        ]);

        Quiz::create([
            'title' => 'Database Management Quiz', 
            'quiz_desc' => 'A quiz that tests knowledge on database management and SQL queries.', 
            'score' => 0, 
            'userID' => 1, 
        ]);

        Quiz::create([
            'title' => 'Web Development Fundamentals Quiz', 
            'quiz_desc' => 'A quiz covering the fundamental concepts of web development.', 
            'score' => 0, 
            'userID' => 2, 
        ]);

        Quiz::create([
            'title' => 'JavaScript Basics Quiz', 
            'quiz_desc' => 'A quiz assessing knowledge of basic JavaScript concepts.', 
            'score' => 0, 
            'userID' => 1, 
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Achievement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Achievement::insert([
            [
                'name' => 'Ember',
                'description' => "Every fire begins with a small ember. Keep the flame alive!",
                'required_score' => 60,
                'image' => 'imgs/Achievement/Ember.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Flare',
                'description' => "Your skills are glowing brighter. Keep up the momentum!",
                'required_score' => 90,
                'image' => 'imgs/Achievement/Flare.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Inferno',
                'description' => "You've reached peak performance. You're unstoppable!",
                'required_score' => 100,
                'image' => 'imgs/Achievement/Inferno.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

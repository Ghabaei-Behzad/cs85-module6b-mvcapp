<?php
/*  
Behzad Ghabaei
CS 85 
Module 6
Instructor Seno
7/8/2026
 */
namespace App\Models;

class Workout {
    public string $activity;
    public int $duration; // in minutes
    public string $intensity;

    public function __construct(string $activity, int $duration, string $intensity) {
        $this->activity = $activity;
        $this->duration = $duration;
        $this->intensity = $intensity;
    }

    // Business logic: Calculate estimated calories burned based on intensity
    public function calculateCaloriesBurned(): int {
        $caloriesPerMinute = match (strtolower($this->intensity)) {
            'high' => 12,
            'medium' => 8,
            'low' => 5,
            default => 6,
        };

        return $this->duration * $caloriesPerMinute;
    }
}

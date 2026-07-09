<?php
/*
Behzad Ghabaei
CS 85 PHP
Module 6 Assign 6A
MVC app
Instructor Seno
7/9/2026
*/

namespace App\Controllers;

use App\Models\Workout;

class WorkoutController {
    
    public function handleRequest(): void {
        // Form input validation
        $activity = filter_input(INPUT_POST, 'activity', FILTER_SANITIZE_SPECIAL_CHARS);
        $duration = filter_input(INPUT_POST, 'duration', FILTER_VALIDATE_INT);
        $intensity = filter_input(INPUT_POST, 'intensity', FILTER_SANITIZE_SPECIAL_CHARS);

        $error = null;
        $workout = null;

        // Check if the form was actually submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!$activity || !$duration || $duration <= 0 || !$intensity) {
                $error = "Invalid input! Please fill out all fields with valid data.";
            } else {
                // Input is valid, instantiate the Model
                $workout = new Workout($activity, $duration, $intensity);
            }
        }

        // Pass variables to the View, using the magic constant __DIR__
        // By requiring the view file, it inherits the local variables ($workout, $error)
        require __DIR__ . '/../../views/workout_view.php';
    }
}

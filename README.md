### Behzad Ghabaei
### CS 85 - PHP programming
### Module 6 Assignment 6A
### MVC - Based PHP Application
### README.md
### Instructor Seno
### 7/8/2026

### Prompt Used
### “Write a simple PHP helper method inside a class that takes an array of numeric values representing daily workout durations, filters out any values that are zero or negative, and returns the average duration as a float.”

### The AI Output
<?php

namespace App\Helpers;

class FitnessStats {
    public static function calculateAverageDuration(array $durations): float {
        $validDurations = array_filter($durations, function($value) {
            return $value > 0;
        });

        if (empty($validDurations)) {
            return 0.0;
        }

        return array_sum($validDurations) / count($validDurations);
    }
}

### Critique
### What Worked: The AI used native array utilities (array_filter and array_sum), which keeps the code clean and fast. It correctly included a guard clause (if (empty($validDurations))) to prevent a catastrophic "Division by Zero" fatal error if the input array only contained invalid data.
### What Didn't Work / Formatting Issues: While functional, the code uses a verbose anonymous callback function inside array_filter.
### Changes Made: To modernize the code, I refactored the anonymous function into a cleaner PHP arrow function: fn($value) => $value > 0. This makes the code shorter and easier to parse visually.
### README.md
### Why I chose this topic and what it does.
### I chose to build a Personal Fitness Goal Tracker because tracking daily habits and exercise is a practical tool that fits perfectly into a modular programming lab.  The application tool that fits perfectly into a modular programming lab.  This application features a web form where a user can enter an activity name, the length of time they exercised, and select their physical fatigue level.  When submitted, the application processes the information to give the user a summary and calculates an estimate of how many calories are burned based on the intensity of the activity.

### The hardest part of this project, and why.
### This project was difficult at the beginning because I wasn’t sure where the directories belonged.  I remembered that my folder already had a public file from a previous project.  I had to start over and build a separate folder inside of Herd and place my code in a new public file that was not confusing the server. Also “view” inherits variables from the “controller” scope. The “require” statements execute inline variables instantiated in “WorkoutController.php” and are accessible in “workout_view.php”.  Writing view references variables like $workout, and they are not defined at the top of the file..The debugging on the relative directory path (__DIR__ . ‘/../../’) broke the file system.

### What I leared about MVC
### The lab shows me that decoupling tasks works well.   Database calls, HTML, and input validation code where mixed but keeping the code bite sized was much better.  Changing things from the program like how calories are calculated, is possible with the “Model.” If I want more submission form style, I can do that easily with the “view” folder.  Composer PSR-4 autoloader brings it all together, leaving “require_once” declarations behind. 

### Critique of the AI-Generated Code
### The AI tool was really interesting.  It can catch errors such as division - by - zero. I found the helper function to be nice and short, and easy to understand.   












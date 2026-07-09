### *** Behzad Ghabaei ***
### *** CS 85 ***
### *** README.md ***
### *** Assignment 6 ***
### *** Instructor Seno ***
### *** 7/8/2026 ***

### *** App Description ***
When I launch Laravel Herd and point the web browser to the local project domain 
http://cs85.test/module6a_mvc_project/public/index.php there will be will a clean dashboard layout.
On entering data and submitting the form, this application will process the inputs and display the following structured result below. 
Summary of your effort:
Activity: Running
Duration: 30 minutes
Intensity: High
Estimated Burn: 360 Calories 

<img width="612" height="644" alt="Screenshot (1712)" src="https://github.com/user-attachments/assets/34b845d9-1832-4617-b1d1-027f68ada444" />

### *** Setup instructions ***
Start the Herd App. > inside the Herd folder create a directory cs85 > create a directory in cs85 > module6a_mvc_project > create 3 directories inside module6a_mvc_project called "src", "views" and "public" >  in the module6a_mvc_project directory run "composer init" >  "Welcome to the Composer config generator," type enter to all defaults and a composer.json file will be created. > open composer.json and change the psr-4 configuration to "App\\": "src/" > this configures the psr-4 autoloading > next, generate the autoloader with the command "composer dump-autoload" > inside the src folder create two directories called Models and Controllers > inside of the Models folder create a file called "Workout.php" and build an object oriented program with a function. that calculates calories. > in the Controllers folder create WorkoutController.php > Controller intercepts user inputs, validates them, talks to the Model, and passes the resulting data off to the View. The View simply renders the HTML template. > build the namespace, use, handleRequest() function with filter_input, and the request method === post > inside the "views" folder create a document with HTML and style for the form of the app. > call this "workout_view.php" > The web server needs a unified entry point to trigger the autoloader and bootstrap the application. We will use public/index.php as our Front Controller. > in the "public" folder create a file called index.php > finally add a folder called Helpers in the src folder and paste or type the AI generated code called "FitnessStatus.php" > In conclusion, open a browser and navigate to http://cs85.test/module6a_mvc_project/public/index.php to see the Application.

<img width="397" height="506" alt="Screenshot (1709)" src="https://github.com/user-attachments/assets/ad7d194f-cc62-4511-9345-895d2e991094" />

### *** Reflection and AI critique ***

### AI Code Review and Critique
### Choose 1 function or method
### Use ChatGPT or similar to generate code
### Submit:
### 1. Your prompt used: "Write a simple PHP helper method inside a class that takes an array of numeric values representing daily workout durations, filters out any values that are zero or negative, and returns the average duration as a float."

### 2. Raw AI output:

```php
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

```
### 3. Your critique: what worked, what didn't, any changes.

### ***What Worked:*** 
The AI used native array utilities (array_filter and array_sum), which keeps the code clean and fast. It correctly included a guard clause (if (empty($validDurations))) to prevent a catastrophic "Division by Zero" fatal error if the input array only contained invalid data.

### ***What Didn't Work / Formatting Issues:*** 
While functional, the code uses a verbose anonymous callback function inside array_filter.

### ***Changes Made:***
 To modernize the code, I refactored the anonymous function into a cleaner PHP arrow function: fn($value) => $value > 0. This makes the code shorter and easier to parse visually.

### 4. Reflection
### Write 300–500 words about:
### Why you chose your topic
I chose to build a Personal Fitness Goal Tracker because tracking daily habits is a practical tool that fits perfectly into a modular programming lab.
### What your app does
 The application features a web form where a user can enter an activity name, the length of time they exercised, and select their physical exertion level. When submitted, the application dynamically processes the information to give the user a neat summary and calculates an estimate of how many calories they burned based on the structural intensity of the activity.

### What was the hardest part and why
This project was difficult at the beginning because I wasn’t sure where the directories belonged.  I remembered that my folder already had a public file from a previous project.  I had to start over and build a separate folder inside of Herd and place my code in a new public file that was not confusing the server.

The most challenging part of this project was wrapping my brain around how the views inherit variables from the controller scope. Because require statements execute inline, variables instantiated in WorkoutController.php suddenly become accessible in workout_view.php. Initially, it felt counter-intuitive to write a view template that references variables like $workout without explicitly defining them at the top of the file. Debugging the relative directory nesting paths (__DIR__ . '/../../') required some trial-and-error to ensure the file system didn't break.

### What you learned about MVC
This lab showed me the power of decoupling business tasks. In past assignments, I would mix database calls, HTML blocks, and input validation code into one giant script. By breaking things down, I noticed how much easier it is to maintain the code. If I want to change how calories are calculated, I only edit the Model. If I want to style the submission form, I only open the View. Composer's PSR-4 autoloader ties everything together magically, removing the need for manual, messy require_once declarations at the top of every file.

### Your critique of the AI-generated code
Analyzing the AI tool output was highly educational. The tool successfully caught a critical edge-case scenario: division by zero. However, it generated a slightly older style of PHP code block. Rewriting its callback array loop into a modern PHP arrow function taught me that while AI is great for fast boilerplate setups, a human engineer is still necessary to optimize, format, and fit the code neatly into an existing project architecture.

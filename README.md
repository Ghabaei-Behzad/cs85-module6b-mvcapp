####  Behzad Ghabaei 
####  CS 85 
####  README.md 
####  Assignment 6 
####  Instructor Seno 
####  7/8/2026 

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
Start the Herd App. > inside the Herd folder create a directory cs85 > create a directory in cs85 > module6a_mvc_project > create 3 directories inside module6a_mvc_project called "src", "views" and "public" >  in the module6a_mvc_project directory run "composer init" >  "Welcome to the Composer config generator," type enter to all defaults and a composer.json file will be created. > open composer.json and change the psr-4 configuration to "App\\\\": "src/" > this configures the psr-4 autoloading > next, generate the autoloader with the command "composer dump-autoload" > inside the src folder create two directories called Models and Controllers > inside of the Models folder create a file called "Workout.php" and build an object oriented program with a function. that calculates calories. > in the Controllers folder create WorkoutController.php > Controller intercepts user inputs, validates them, talks to the Model, and passes the resulting data off to the View. The View simply renders the HTML template. > build the namespace, use, handleRequest() function with filter_input, and the request method === post > inside the "views" folder create a document with HTML and style for the form of the app. > call this "workout_view.php" > The web server needs a unified entry point to trigger the autoloader and bootstrap the application. We will use public/index.php as our Front Controller. > in the "public" folder create a file called index.php > finally add a folder called Helpers in the src folder and paste or type the AI generated code called "FitnessStatus.php" > In conclusion, open a browser and navigate to http://cs85.test/module6a_mvc_project/public/index.php to see the Application.

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
### In order to make this AI generated file work.
First. A short description.  The namespace App\Helpers; tells PHP where this file lives in our structure, "static" means we don't have to create a "new FitnessStats()" object to use it,
and if desired, filter out all zero or negative numbers using an arrow function
 ``` php
 $validDurations = array_filter($durations, fn($value) => $value > 0);
```
 A guard clause says, if the array is empty, stop early. This prevents dividing by zero.
 The final return statement says, add up all the valid numbers and divide by how many numbers there are.
 1. Update the WorkoutController.php file
  ``` php
  use App\Helpers\FitnessStats; // 1. Import your new helper class!
  ```
2. paste this code before the first if statement
``` php
 // Mock historical data: imagine these came from a database of past entries
        // Notice the negative number and zero: our helper will filter these out!
        $pastDurations = [30, 45, 0, 60, -15, 20]; 

        // 2. Use the static helper method directly
        $averageDuration = FitnessStats::calculateAverageDuration($pastDurations);
```
3. Next, display the calculated historical average inside your user interface. Inside of workout_view.php
  ```html
<!-- Add this snippet inside your <div class="container"> right below the <h2> header -->
<div style="background: #ebf5fb; border-left: 5px solid #3498db; padding: 10px; margin-bottom: 20px; border-radius: 4px;">
    📊 <strong>Your Historical Stats:</strong> <br>
    Your average workout duration is <strong><?= $averageDuration ?></strong> minutes.
</div>
```
Here is a screenshot of how it would look:
<img width="559" height="354" alt="Screenshot (1713)" src="https://github.com/user-attachments/assets/c0370c7f-93ff-4190-9337-602b290323cb" />

### ***What Didn't Work / Formatting Issues:*** 
The average displays a group of numbers however they are not provided by the user.  The array simply displays the average. The fit track work out log displays this message,

📊 Your Historical Stats:
Your average workout duration is 38.75 minutes. 

This was not as interesting as showing the average of the input duration.
Also, while functional, the code uses a verbose anonymous callback function inside array_filter.

### ***Changes Made:***
 To modernize the code, I refactored the anonymous function into a cleaner PHP arrow function: fn($value) => $value > 0. This makes the code shorter and easier to parse visually.

### 4. Reflection
### Write 300–500 words about:
### Why you chose your topic
I chose to build a Personal Fitness Goal Tracker because tracking daily habits is a practical tool that fits perfectly into a modular programming lab.
### What your app does
 The application features a web form where a user can enter an activity name, the length of time they exercised, and select their physical exertion level. When submitted, the application dynamically processes the information to give the user a neat summary and calculates an estimate of how many calories they burned based on the structural intensity of the activity.

### What was the hardest part and why
This project was difficult at the beginning because I wasn’t sure where the directories belonged.  I remembered that my folder already had a public file from a previous project.  I had to start over and build a separate folder inside of Herd and place my code in a new "public" file that was not confusing the server.  While trying to improve the quality of this project, debugging and changing the code of the program caused serious errors that could not be repaired.  Laravel herd provides some insight of where the problem is located, but overall it was too difficult to decipher and repair the problem.  The best way to improve the quality is to keep a copy of the working files separate from the files I want to improve, in case going back is not possible.  For example, after fixing some runtime errors, I discovered the program stopped working.  Also running a command twice such as "composer dump-autoload" could confuse the project beyond repair. In order to continue, I made a separate folder called "cs85_2" next to "cs85." Then I followed these instructions from this README.md page, and continued to copy and paste the needed files from my github repository, all the files were in working order. Starting all over again from the beginning worked great, having two folders allowed more experimentation and improvements.  The two folders, "public" and "views" are named the same in each different composer project and must be unique in the path. 

The most challenging part of this project was wrapping my brain around how the views inherit variables from the controller scope. Because require statements execute inline, variables instantiated in WorkoutController.php suddenly become accessible in workout_view.php. Initially, it felt counter-intuitive to write a view template that references variables like $workout without explicitly defining them at the top of the file. Debugging the relative directory nesting paths (`__DIR__` . '/../../') required some trial-and-error to ensure the file system didn't break. `__DIR__`: Resolves to the directory path of the file.  Magic constants are dynamic. Their values automatically resolve at compile time based entirely on where they are written in your code.  Here are some example uses.

### located in public/index.php
require_once `__DIR__` . '/../vendor/autoload.php';

### located in src/Controllers/WorkoutController.php
 require `__DIR__` . '/../../views/workout_view.php';

### located in vendor/autoload.php
require_once `__DIR__` . '/composer/autoload_real.php';

### example uses located in vendor/composer/autoload_XXX.php
### $vendorDir = dirname(`__DIR__`);
### require `__DIR__` . '/ClassLoader.php';
### 0 => `__DIR__` . '/../..' . '/src',




### What you learned about MVC
This lab showed me the power of decoupling business tasks. In past assignments, I would mix database calls, HTML blocks, and input validation code into one giant script. By breaking things down, I noticed how much easier it is to maintain the code. If I want to change how calories are calculated, I only edit the Model. If I want to style the submission form, I only open the View. Composer's PSR-4 autoloader ties everything together magically, removing the need for manual, messy require_once declarations at the top of every file.

### Your critique of the AI-generated code
Analyzing the AI tool output was highly educational. The tool successfully caught a critical edge-case scenario: division by zero. However, it generated a slightly older style of PHP code block. Rewriting its callback array loop into a modern PHP arrow function taught me that while AI is great for fast boilerplate setups, a human engineer is still necessary to optimize, format, and fit the code neatly into an existing project architecture.  The AI generated code lacks some flexibility and requires a person to incorporate and implement specifications that would have been more interesting and useful for a user. My idea would be to accumulate exercise durations, that a user would input, and return the average to the interface, rather than with an array and without implementation in the interface.

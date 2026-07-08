<?php

// 1. Load the Composer Autoloader
require_once __DIR__ . '/../vendor/autoload.php';

// 2. Import your Controller using its namespace
use App\Controllers\WorkoutController;

// 3. Instantiate and run the controller
$controller = new WorkoutController();
$controller->handleRequest();

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FitTrack - Personal Goal Tracker</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f4f7f6; }
        .container { max-width: 500px; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, select { width: 100%; padding: 8px; box-sizing: border-box; }
        button { background: #27ae60; color: white; padding: 10px; border: none; width: 100%; cursor: pointer; font-size: 16px; }
        .error { color: #c0392b; font-weight: bold; margin-bottom: 15px; }
        .result { background: #e8f8f5; border-left: 5px solid #2cc990; padding: 15px; margin-top: 20px; }
    </style>
</head>
<body>

<div class="container">
    <h2>🏋️‍♂️ Fit Track: Log Your Workout</h2>
    
    <?php if (!empty($error)): ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <form action="" method="POST">
        <div class="form-group">
            <label for="activity">Workout Activity:</label>
            <input type="text" id="activity" name="activity" placeholder="e.g., Running, Weightlifting" required>
        </div>
        
        <div class="form-group">
            <label for="duration">Duration (Minutes):</label>
            <input type="number" id="duration" name="duration" min="1" required>
        </div>
        
        <div class="form-group">
            <label for="intensity">Intensity Level:</label>
            <select id="intensity" name="intensity">
                <option value="low">Low</option>
                <option value="medium" selected>Medium</option>
                <option value="high">High</option>
            </select>
        </div>
        
        <button type="submit">Track Workout</button>
    </form>

    <!-- Display output if a Model instance exists -->
    <?php if (isset($workout) && !$error): ?>
        <div class="result">
            <h3>Summary of your effort:</h3>
            <p><strong>Activity:</strong> <?= htmlspecialchars($workout->activity) ?></p>
            <p><strong>Duration:</strong> <?= $workout->duration ?> minutes</p>
            <p><strong>Intensity:</strong> <?= ucfirst($workout->intensity) ?></p>
            <p><strong>Estimated Burn:</strong> <?= $workout->calculateCaloriesBurned() ?> Calories 🔥</p>
        </div>
    <?php endif; ?>
</div>

</body>
</html>

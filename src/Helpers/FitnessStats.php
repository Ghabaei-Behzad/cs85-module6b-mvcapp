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

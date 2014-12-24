<?php
date_default_timezone_set('Europe/Sofia');
preg_match_all('/[^A-Za-z\d](\d+)[^A-Za-z]/', $_GET['numbersString'], $numbers);
preg_match_all('/\d{4}-\d{2}-\d{2}/', $_GET['dateString'], $dates);
$sum = array_sum($numbers[1]);
$sum = strrev($sum);
$daysToAdd = 'P' . $sum . 'D';

for ($i = 0; $i < count($dates[0]); $i++) {
    $dates[0][$i] = DateTime::createFromFormat('Y-m-d', $dates[0][$i]);
    $dates[0][$i]->add(new DateInterval($daysToAdd));
}

if (count($dates[0]) > 0) {
    echo '<ul>';
    foreach ($dates[0] as $date) {
        echo '<li>' . ($date->format('Y-m-d')) . '</li>';
    }
    echo '</ul>';
} else {
    echo '<p>No dates</p>';
}
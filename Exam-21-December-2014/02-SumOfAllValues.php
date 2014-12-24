<?php
    $keysCount = preg_match('/(^[A-Za-z\_]+)\d.*\d([A-Za-z\_]+)/', $_GET['keys'], $keys);
    $text = $_GET['text'];
    
    if (count($keys) > 2) {
        $pattern = '/' . $keys[1] . '(.+?)' . $keys[2] . '/';
        preg_match_all($pattern, $text, $resultArr);
        $numericFound;
        $sum = 0;
        foreach ($resultArr[1] as $match) {
            if (is_numeric($match)) {
                $sum += floatval(trim($match));
                $numericFound = TRUE;
            }
        }

        if ($numericFound) {
            echo '<p>The total value is: <em>' . $sum . '</em></p>';
        } elseif (!$numericFound || $sum == 0) {
            echo '<p>The total value is: <em>nothing</em></p>';
        }
    } else {
        echo '<p>A key is missing</p>';
    }
<?php
$input = json_decode($_GET['jsonTable']);
$cols = $input[0];
$miliseconds = [];

for ($i = 1; $i < count($input[1]); $i++) {
    preg_match('/time\s*=\s*(\d+)\s*ms/', $input[1][$i], $matches);
    if ($matches[1] >= 33) {
    $miliseconds[] = chr($matches[1]);
    } else {
        $miliseconds[] = ' ';
    }
}
$currentPosition = 0;

echo "<table border='1' cellpadding='5'>";
if ($cols > 1) {
    while ($currentPosition < count($miliseconds)) {
        if ($miliseconds[$currentPosition] != '*') {
            echo '<tr>';
            for ($j = 0; $j < $cols; $j++) {
                if ($currentPosition < count($miliseconds)) {
                    if ($miliseconds[$currentPosition] != '*' && $miliseconds[$currentPosition] != ' ') {
                        echo "<td style='background:#CAF'>" . htmlentities($miliseconds[$currentPosition]) . "</td>";
                        $currentPosition++;
                    } elseif ($miliseconds[$currentPosition] == '*') {
                        for ($k = 0; $k < $cols - $j; $k++) {
                        echo '<td></td>';
                        }
                        $currentPosition++;
                        break;
                    } elseif ($miliseconds[$currentPosition] == ' ') {
                        echo '<td></td>';
                        $currentPosition++;
                    }
                } else {
                    echo '<td></td>';
                }
            }
            echo '</tr>';
        } else {
            $currentPosition++;
        }
    }
} else {
    for ($m = 0; $m < count($miliseconds); $m++) {
        if ($miliseconds[$m] != '*' && $miliseconds[$m] != ' ') {
            echo "<tr><td style='background:#CAF'>" . htmlentities($miliseconds[$m]) . "</td></tr>";
        } elseif ($miliseconds[$m] == ' ') {
            echo '<td></td>';
        }
    }
}
echo '</table>'; 
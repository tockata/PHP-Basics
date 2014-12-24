<?php
if (!empty($_GET['typeLuggage']) && !empty($_GET['room']) && !empty($_GET['minWeight']) && !empty($_GET['maxWeight'])) {
    $luggage = preg_split('/C\|\_\|/', $_GET['luggage'], -1, PREG_SPLIT_NO_EMPTY);
    $typeLuggage = $_GET['typeLuggage'];
    $room = $_GET['room'];
    $minWeight = intval($_GET['minWeight']);
    $maxWeight = intval($_GET['maxWeight']);
    $result = [];
    
    foreach ($luggage as $data) {
        $splittedData = preg_split('/\s*;\s*/', $data, -1, PREG_SPLIT_NO_EMPTY);
        $type = $splittedData[0];
        $roomFor = $splittedData[1];
        $name = $splittedData[2];
        $weight = intval(substr($splittedData[3], 0, (strlen($splittedData[3]) - 2)));

        if (!key_exists($roomFor, $result)) {
            $result[$roomFor] = [];
        }
        if (!key_exists($type, $result[$roomFor])) {
            $result[$roomFor][$type] = [];
            $result[$roomFor][$type]['weight'] = 0;
        }

        $result[$roomFor][$type]['weight'] += $weight;
        $result[$roomFor][$type][$name] = $weight;
        ksort($result[$roomFor]);
        ksort($result[$roomFor][$type]);
    }

    $resultData = $result[$room];

    echo '<ul>';
    foreach ($resultData as $key => $value) {
        if (in_array($key, $typeLuggage)) {
            if ($value['weight'] >= $minWeight && $value['weight'] <= $maxWeight) {
                echo '<li><p>' . $key . '</p>';
                echo '<ul><li><p>' . $room . '</p><ul><li><p>';
                $maxCount = count($value) - 1;
                $count = 0;
                foreach ($value as $pieceName => $weightValue) {
                    if ($count == 0) {
                        echo $pieceName;
                    } elseif ($count < $maxCount) {
                        echo ', ' . $pieceName;
                    } else {
                        echo ' - ' . $weightValue . 'kg</p></li></ul></li></ul></li>';
                    }
                    $count++;
                }
            }
        }
    }
    echo '</ul>';
} else {
    echo '<ul></ul>';
}
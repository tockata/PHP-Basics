<?php
$input = json_decode($_GET['jsonTable']);
$k = $input[1][0];
$s = $input[1][1];

$resultArr = [];
$maxLength = 0;

foreach ($input[0] as $word) {
    $word = $word;
    $word = strtoupper($word);
    $newWord = '';
    for ($i = 0; $i < strlen($word); $i++) {
        if (ctype_alpha($word[$i])) {
        $asciiValue = ord($word[$i]);
        $positionInAlphabet = $asciiValue - ord('A');
        $newLetter = ($k * $positionInAlphabet + $s) % 26;
        $newLetter = chr($newLetter + 65);
        $newWord .= $newLetter;
        } else {
            $newWord .= $word[$i];
        }
    }
    $resultArr[] = str_split($newWord);
    if (strlen($newWord) > $maxLength) {
        $maxLength = strlen($newWord);
    }
}

for ($i = 0; $i < count($resultArr); $i++) {
    while (count($resultArr[$i]) < $maxLength) {
        $resultArr[$i][] = '';
    }
}

$resultStr = "<table border='1' cellpadding='5'>";
for ($row = 0; $row < count($resultArr); $row++) {
    $resultStr .= '<tr>';
    for ($col = 0; $col < count($resultArr[$row]); $col++) {
        if (strlen($resultArr[$row][$col]) != 0) {
            $resultStr .= "<td style='background:#CCC'>" . htmlentities($resultArr[$row][$col]) . "</td>";
        } else {
            $resultStr .= '<td></td>';
        }
    }
    $resultStr .= '</tr>';
}
$resultStr .= '</table>';
echo $resultStr;
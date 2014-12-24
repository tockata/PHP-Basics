<?php
$childName = preg_replace('/ /', '-', $_GET['childName']);
$wantedPresent = $_GET['wantedPresent'];
$riddles = preg_split('/;/', $_GET['riddles'], -1, PREG_SPLIT_NO_EMPTY);
$riddleNumber = (strlen($childName) % count($riddles)) - 1;
if ($riddleNumber < 0) {
    $riddleNumber = count($riddles) - 1;
}

echo '$giftOf' . htmlspecialchars($childName) . " = $[wasChildGood] ? '" . htmlspecialchars($wantedPresent) .
        "' : '" . htmlspecialchars($riddles[$riddleNumber]) . "';";
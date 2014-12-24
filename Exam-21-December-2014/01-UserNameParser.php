<?php
$names = preg_split('/\n+/', $_GET['list'], -1, PREG_SPLIT_NO_EMPTY);
$length = $_GET['length'];
if (isset($_GET['show'])) {
    $show = TRUE;
} else {
    $show = FALSE;
}

for ($i = 0; $i < count($names); $i++) {
    $names[$i] = trim($names[$i]);
    if ($names[$i] == '') {
        unset($names[$i]);
    }
}

echo '<ul>';
foreach ($names as $name) {
    if (strlen($name) >= $length) {
        echo '<li>' . htmlspecialchars($name) . '</li>';
    } else {
        if ($show) {
            echo '<li style="color: red;">' . htmlspecialchars($name) . '</li>';
        }
    }
}
echo '</ul>';
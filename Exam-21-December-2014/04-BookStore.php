<?php
date_default_timezone_set('Europe/Sofia');
$list = preg_split('/\n+/', $_GET['text'], -1, PREG_SPLIT_NO_EMPTY);
$minPrice = floatval($_GET['min-price']);
$maxPrice = floatval($_GET['max-price']);
$sort = trim($_GET['sort']);
$order = trim($_GET['order']);

$products = [];

for ($i = 0; $i < count($list); $i++) {
    $data = preg_split('/\s*\/\s*/', $list[$i], -1, PREG_SPLIT_NO_EMPTY);
    $author = trim($data[0]);
    $name = trim($data[1]);
    $genre = trim($data[2]);
    $price = trim($data[3]);
    $floatvalPrice = floatval($price);
    $date = trim($data[4]);
    $dateUnix = strtotime($data[4]);
    $info = trim($data[5]);
    if ($floatvalPrice >= $minPrice && floatval($price) <= $maxPrice) {
        $products[] = ['author' => $author, 'name' => $name, 'genre' => $genre, 'price' => $price,
                        'floatvalPrice' => $floatvalPrice, 'publish-date' => $date, 'dateUnix' => $dateUnix,
                        'info' => $info];
    }
}

foreach ($products as $key => $row) {
    if ($sort == 'publish date') {
        $sortOrder[$key] = $row['dateUnix'];
    } else {
        $sortOrder[$key] = $row[$sort];
        $sortDate[$key] = $row['dateUnix'];
    }
}

if ($sort == 'publish date' && $order == 'ascending') {
    array_multisort($sortOrder, SORT_ASC, $products);
} elseif ($sort == 'publish date' && $order == 'descending') {
    array_multisort($sortOrder, SORT_DESC, $products);
} else {
    if ($order == 'ascending') {
        array_multisort($sortOrder, SORT_ASC, $sortDate, SORT_ASC, $products);
    } else {
        array_multisort($sortOrder, SORT_DESC, $sortDate, SORT_ASC, $products);
    }
}

foreach ($products as $key => $row) {
    echo '<div>';
    echo '<p>' . htmlspecialchars($row['name']) . '</p>';
    echo '<ul>';
    echo '<li>' . htmlspecialchars($row['author']) . '</li>';
    echo '<li>' . htmlspecialchars($row['genre']) . '</li>';
    echo '<li>' . htmlspecialchars($row['price']) . '</li>';
    echo '<li>' . htmlspecialchars($row['publish-date']) . '</li>';
    echo '<li>' . htmlspecialchars($row['info']) . '</li>';
    echo '</ul>';
    echo '</div>';
}
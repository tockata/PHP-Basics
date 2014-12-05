<?php
date_default_timezone_set('Europe/Sofia');

if (isset($_POST['text'], $_POST['sort'], $_POST['order'])) {
    $text = $_POST['text'];
    $sort = $_POST['sort'];
    $order = $_POST['order'];
    
    $pattern = '/(.+?)-(.+?)-([\d\-\: ]+)(.+)/';
    preg_match_all($pattern, $text, $data);
    
    $seminars = array();
    for ($i = 0; $i < count($data[0]); $i++) {
        $seminars[] = array('seminarName' => $data[1][$i], 'lecturerName' => $data[2][$i],
        'dateTime' => strtotime($data[3][$i]), 'info' => $data[4][$i]);
    }
    // Obtain a list of columns
    foreach ($seminars as $key => $row) {
        $sortKey[$key]  = $row[$sort];
    }
    // Sort the data
    if ($order == 'ascending') {
        array_multisort($sortKey, SORT_ASC, $seminars);
    } else {
        array_multisort($sortKey, SORT_DESC, $seminars);
    }
    
    $seminars = (object)$seminars;
    //var_dump($seminars);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="07-SeminarGenerator.css">
        <title>Seminar Generator</title>
    </head>
    <body>
        <form method="post" action="07-SeminarGenerator.php">
            <textarea rows="10" cols="100" name="text"></textarea><br>
            <label for="sort">Sort by: </label>
            <select id="sort" name="sort">a
                <option value="seminarName">Name</option>
                <option value="dateTime">Date</option>
            </select>
            <label for="order" name="order">Order by: </label>
            <select id="order" name="order">
                <option value="ascending">Ascending</option>
                <option value="descending">Descending</option>
            </select>
            <input type="submit">
        </form><br>
        <?php if (isset($_POST['text'], $_POST['sort'], $_POST['order'])): ?>
        <table>
            <thead>
                <tr>
                    <th>Seminar name</th>
                    <th>Date</th>
                    <th>Participate</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($seminars as $key => $seminar): ?>
                <tr>
                    <td>
                        <a href="#" onmouseover="showDiv(<?= $key ?>)" onmouseout="hideDiv(<?= $key ?>)">
                            <?= htmlentities($seminar['seminarName']) ?>
                            <div id="<?= $key ?>" class="hiddenDiv">
                                <p><span>Lecturer:</span> <?= htmlentities($seminar['lecturerName']) ?></p>
                                <p><span>Details:</span> <?= htmlentities($seminar['info']) ?></p>
                            </div>
                        </a>
                    </td>
                    <td><?= htmlentities(date('d-m-Y H:i', $seminar['dateTime'])) ?></td>
                    <td><button>Sign Up</button></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
        <script src="07-ShowHideDiv.js"></script>
    </body>
</html>
<?php
if (isset($_POST['fName'], $_POST['lName'], $_POST['email'], $_POST['examScore'],
        $_POST['sort'], $_POST['order'])) {
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $examScore = $_POST['examScore'];
    $sort = $_POST['sort'];
    $order = $_POST['order'];
    
    $students = array();
    $totalScore = 0;
    
    for ($i = 0; $i < count($fName); $i++) {
        $students[] = array('fName' => $fName[$i], 'lName' => $lName[$i],
            'email' => $email[$i], 'score' => $examScore[$i]);
        $totalScore += (int)$examScore[$i];
    }
    
    $averageScore = round($totalScore / count($students));
    
    // Obtain a list of columns
    foreach ($students as $key => $row) {
        $sortKey[$key]  = $row[$sort];
    }

    // Sort the data
    if ($order == 'ascending') {
        array_multisort($sortKey, SORT_ASC, $students);
    } else {
        array_multisort($sortKey, SORT_DESC, $students);
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Student Sorting</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <form method="post" action="StudentSorting.php">
            <table id="input">
                <thead>
                    <tr>
                        <td>First name:</td>
                        <td>Second name:</td>
                        <td>Email:</td>
                        <td colspan="2">Exam score:</td>
                    </tr>
                </thead>
                <tbody>
                    <tr id="clone">
                        <td><input type="text" name="fName[]"></td>
                        <td><input type="text" name="lName[]"></td>
                        <td><input type="email" name="email[]"></td>
                        <td><input type="number" min="0" max="400" name="examScore[]"></td>
                        <td><input type="button" value="-" onclick="removeRow(this.parentNode)"></td>
                    </tr>
                </tbody>
            </table><br>
            <input type="button" value="+" onclick="addRow()">
            <label for="sort">Sort by:</label>
            <select id="sort" name="sort">
                <option value="fName">First name</option>
                <option value="lName">Last name</option>
                <option value="email">Email</option>
                <option value="score">Exam score</option>
            </select>
            <label for="order">Order:</label>
            <select id="order" name="order">
                <option value="descending">Descending</option>
                <option value="ascending">Ascending</option>
            </select>
            <input type="submit">
        </form><br>
        <?php
        if (isset($_POST['fName'], $_POST['lName'], $_POST['email'], $_POST['examScore'],
        $_POST['sort'], $_POST['order'])): ?>
        <table id="output">
            <thead>
                <tr>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Exam score</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $key => $student): ?>
                <tr>
                    <td><?= $student['fName'] ?></td>
                    <td><?= $student['lName'] ?></td>
                    <td><?= $student['email'] ?></td>
                    <td><?= $student['score'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">Average score:</td>
                    <td><?= $averageScore ?></td>
                </tr>
            </tfoot>
        </table>
        <?php endif; ?>
        <script src="addRemoveRows.js"></script>
    </body>
</html>
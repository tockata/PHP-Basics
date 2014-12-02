<?php
function sumDigits($number) {
    $currentSum = 0;
    $number = (string)$number;
    
    for ($i = 0; $i < strlen($number); $i++) {
        $currentSum += intval($number[$i]);
    }
    
    return $currentSum;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Sum of Digits</title>
    </head>
    <body>
        <form method="post" action="05-SumOfDigits.php">
            <label for="nums">Input string: </label>
            <input type="text" name="nums" id="nums" />
            <input type="submit" />
        </form><br />
        
        <?php
        if (isset($_POST['nums'])): ?>
        <table border="1">
            <?php
            $nums = explode(', ', $_POST['nums']);
            foreach ($nums as $element) {
                if (is_numeric($element)) {
                    $sum = sumDigits($element);
                    echo "<tr><td>$element</td><td>$sum</td></tr>";
                } else {
                    echo "<tr><td>$element</td><td>I cannot sum that</td></tr>";
                }
            }
        ?>
        </table>
        <?php endif; ?>
        
    </body>
</html>
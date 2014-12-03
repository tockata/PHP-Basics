<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Word Mapper</title>
    </head>
    <body>
        <form method="POST" action="01-WordMapper.php">
            <textarea rows="5" cols="50" name="input"></textarea><br>
            <input type="submit">
        </form>
        <br>
        <?php
        if (isset($_POST['input'])) {
            $words = preg_split("/[,.!? \/\()]+/", $_POST['input'], -1, PREG_SPLIT_NO_EMPTY);
            //var_dump($words);
            $wordsCount = array();
            
            foreach ($words as $word) {
                $wordToLower = strtolower($word);
                if (!array_key_exists($wordToLower, $wordsCount)) {
                    $wordsCount[$wordToLower] = 0;
                }
                $wordsCount[$wordToLower]++;
            }
        }
        ?>
        <table border="1" style="background-color: lightgrey">
            <?php foreach ($wordsCount as $key => $value): ?>
            <tr>
                <td><?= $key ?></td>
                <td><?= $value ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>
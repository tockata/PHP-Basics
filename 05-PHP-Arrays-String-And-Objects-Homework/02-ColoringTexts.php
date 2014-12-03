<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Coloring Texts</title>
    </head>
    <body>
        <form method="POST" action="02-ColoringTexts.php">
            <textarea rows="5" cols="50" name="input"></textarea><br>
            <input type="submit">
        </form>
        <br>
        <?php
        if (isset($_POST['input'])) {
            preg_match_all("/\S/", $_POST['input'], $matches);
            
            foreach ($matches[0] as $symbol) {
                if (ord($symbol) % 2 != 0) {
                    echo "<span style='color: blue'>$symbol </span>";
                } else {
                    echo "<span style='color: red'>$symbol </span>";
                }
            }
        }
        ?>
    </body>
</html>
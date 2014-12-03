<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Text filter</title>
    </head>
    <body>
        <form method="POST" action="06-URLReplacer.php">
            <textarea rows="5" cols="50" name="text"></textarea><br>
            <input type="submit">
        </form>
        <br>
        <?php
        if (isset($_POST['text'])) {
            $text = $_POST['text'];
            $hyperlinks = preg_match_all('/(?i)<a\s*href\s*=\s*([^>]+)>(.+?)<\/a>/', $text, $matches);
            
            for ($i = 0; $i < count($matches[0]); $i++) {
                $link = substr($matches[1][$i], 1, strlen($matches[1][$i]) - 2);
                $textBetweenATag = $matches[2][$i];
                $replace = "[URL=" . "$link" . "]" . $textBetweenATag. "[/URL]";
                $text = str_replace($matches[0][$i], $replace, $text);
            }
            
            echo htmlentities($text);
        }
        ?>
    </body>
</html>
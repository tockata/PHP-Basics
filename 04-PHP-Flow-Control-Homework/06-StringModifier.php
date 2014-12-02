<?php
function checkPalindrome($str) {
    $reversedStr = strrev($str);
    $isPal = TRUE;
    for ($i=0; $i < strlen($str); $i++) { 
        if ($reversedStr[$i] != $str[$i]) {
            $isPal = FALSE;
        }
    }
    return $isPal;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>String Modifier</title>
    </head>
    <body>
        <form method="post" action="06-StringModifier.php">
            <input type="text" name="string" />
            <input type="radio" name="action" id="palindrome" value="palindrome" />
            <label for="palindrome">Check Palindrome</label>
            <input type="radio" name="action" id="reverse" value="reverse" />
            <label for="reverse">Reverse String</label>
            <input type="radio" name="action" id="split" value="split" />
            <label for="split">Slpit</label>
            <input type="radio" name="action" id="hash" value="hash" />
            <label for="hash">Hash String</label>
            <input type="radio" name="action" id="shuffle" value="shuffle" />
            <label for="shuffle">Shuffle String</label>
            <input type="submit" />
        </form><br />
        
        <?php
        if (isset($_POST['string'], $_POST['action'])) {
            $inputStr = $_POST['string'];
            $action = $_POST['action'];
            
            switch ($action) {
                case 'palindrome':
                    $isPalindrome = checkPalindrome($inputStr);
                    if ($isPalindrome) {
                        echo htmlspecialchars($inputStr) . " is palindrome!";
                    } else {
                        echo htmlspecialchars($inputStr) . " is NOT palindrome!";
                    }
                    break;
                case 'reverse':
                    echo htmlspecialchars(strrev($inputStr));
                    break;
                case 'split':
                    $inputStr = str_split($inputStr, 1);
                    $inputStr = implode(' ', $inputStr);
                    echo htmlspecialchars($inputStr);
                    break;
                case 'hash':
                    echo crypt($inputStr);
                    break;
                case 'shuffle':
                	echo htmlspecialchars(str_shuffle($inputStr));
                	break;
                default: break;
            }
        }
        ?>
    </body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Primes in range</title>
    </head>
    <body>
        <form method="post" action="04-PrimesInRange.php">
            <label for="startNumber">Starting Index: </label>
            <input type="text" name="startNumber" id="startNumber" />
            <label for="endNumber">End: </label>
            <input type="text" name="endNumber" id="endNumber" />
            <input type="submit" value="Submit" />
        </form>
        <br />
        
        <?php
        if (isset($_POST['startNumber'], $_POST['endNumber'])) {
            $start = $_POST['startNumber'];
            $end = $_POST['endNumber'];
            if ($start < 2 || $end < 2 || $start >= $end || !is_numeric($start) || !is_numeric($end)) {
                die('Try Again! Start and End must be numbers greater than 1 and Start number' .
                ' must be smaller than End Number!');
            } else {
                $count = 0;
                for ($i=$start; $i <= $end; $i++) { 
                    
                    if ($count == 0 && ($i == 2 || $i == 3)) {
                        echo "<b>$i</b>";
                        $count++;
                    } elseif ($count > 0 && ($i == 2 || $i == 3)) {
                        echo ", <b>$i</b>";
                    } else {
                        $isPrime = TRUE;
                        for ($j=2; $j <= sqrt($i); $j++) { 
                            if ($i % $j == 0) {
                                $isPrime = FALSE;
                                break;
                            }
                        }
                        if ($isPrime) {
                            if ($count == 0) {
                                echo "<b>$i</b>";
                            } else {
                                echo ", <b>$i</b>";
                            }
                        } else {
                            if ($count == 0) {
                                echo "$i";
                            } else {
                                echo ", $i";
                            }
                        }
                    }
                    $count++;
                }
            }
        }
        ?>
        
    </body>
</html>
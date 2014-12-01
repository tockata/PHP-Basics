<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Print tags</title>
	</head>
	<body>
		<p>Enter Tags:</p>
		<form method="get" action="02-MostFrequentTag.php">
			<input type="text" name="input" />
			<input type="submit" />
		</form>
		
		<?php
        $result = array();
        
        if (isset($_GET['input'])) {
            $tags = explode(', ', $_GET['input']);
            foreach ($tags as $key => $value) {
                if (!array_key_exists($value, $result)) {
                    $result[$value] = 0;
                }
                $result[$value]++;
            }
            
            arsort($result);
            
            foreach ($result as $key => $value) {
                if ($value < 2) {
                    echo $key . ' : ' . $value . ' time<br>';
                } else {
                    echo $key . ' : ' . $value . ' times<br>';
                }
            }
            
            //Find and print first key of the array:
            reset($result);
            $firstKey = key($result);
            echo "<p>Most Frequent Tag is: " . $firstKey . "</p>";
        }
        ?>
	</body>
</html>
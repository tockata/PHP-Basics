<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Rich People's Problem</title>
    </head>
    <body>
        <form method="post" action="02-RichPeoplesProblems.php">
            <label for="cars">Enter cars: </label>
            <input type="text" name="cars" id="cars" />
            <input type="submit" value="Show result" />
        </form>
        
        <!--Generate table: -->
        <?php if (isset($_POST['cars'])): 
            $cars = explode(', ', $_POST['cars']);
            $colors = array('white', 'black', 'red', 'yellow', 'green');
        ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Car</th>
                    <th>Color</th>
                    <th>Count</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i=0; $i < count($cars); $i++):
                    $randomColor = rand(0, count($colors) - 1);
                    $randomCount  = rand(1, 5);
                ?>
                <tr>
                    <td><?= htmlspecialchars($cars[$i]) ?></td>
                    <td><?= $colors[$randomColor] ?></td>
                    <td><?= $randomCount ?></td>
                </tr>
                <?php endfor; ?>
            </tbody>
        </table>
        <?php endif ?>
    </body>
</html>

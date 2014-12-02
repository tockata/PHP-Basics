<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Square Root</title>
    </head>
    <body>
        <table border="1">
            <thead>
                <tr>
                    <th>Number</th>
                    <th>Square</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sum = 0; 
                for ($i=0; $i <= 100; $i += 2):
                    $squareRoot = round(sqrt($i), 2);
                    $sum += $squareRoot;
                ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $squareRoot ?></td>
                    </tr>
                <?php endfor; ?>
                <tfoot>
                    <tr>
                        <td>Total:</td>
                        <td><?= $sum ?></td>
                    </tr>
                </tfoot>
            </tbody>
        </table>
    </body>
</html>
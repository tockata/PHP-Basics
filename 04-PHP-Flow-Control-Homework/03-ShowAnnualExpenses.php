<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Show Annual Expenses</title>
    </head>
    <body>
        <form method="post" action="03-ShowAnnualExpenses.php">
            <label for="year">Enter number of years: </label>
            <input type="text" name="year" id="year" />
            <input type="submit" value="Show costs" />
        </form>
        <?php
        $months = array('January', 'February', 'March', 'April', 'May', 'June', 'July',
                        'August', 'September', 'October', 'November', 'December');
        if (isset($_POST['year'])): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Year</th>
                    <?php for ($i=0; $i < count($months); $i++): ?> 
                        <th><?= $months[$i] ?></th>
                    <?php endfor; ?>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                for ($i=2014; $i > 2014 - $_POST['year'] ; $i--):
                    $sum = 0; 
                ?>
                <tr>
                    <td><?= $i ?></td>
                    <?php 
                    for ($j=0; $j < count($months); $j++): 
                        $randomExpense = rand(0, 999);
                        $sum += $randomExpense;
                    ?>
                    <td><?= $randomExpense ?></td>
                    <?php endfor; ?>
                    <td><?= $sum ?></td>
                </tr>                     
                <?php endfor; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Calculate interest</title>
    </head>
    <body>
        <div id="result">
            <?php
            if (isset($_GET['amount'], $_GET['currency'], $_GET['interest'], $_GET['maturity'])):
                if (filter_var($_GET['amount'], FILTER_VALIDATE_FLOAT) &&
                    filter_var($_GET['interest'], FILTER_VALIDATE_FLOAT)):
                    $amount = (float)$_GET['amount'];
                    $currency = $_GET['currency'];
                    $interestPerMonth = ((float)$_GET['interest']) / 1200;
                    $maturity = (int)$_GET['maturity'];
                    
                    $resultAmount = $amount * pow((1 + $interestPerMonth), $maturity); 
                    $resultAmount = round($resultAmount, 2);
                    
                    if ($currency == '$') {
                        $resultAmount = $currency . ' ' . $resultAmount;
                    } else {
                        $resultAmount = $resultAmount . ' ' . $currency;
                    }
                    ?>
                    <p><?php echo($resultAmount) ?></p>
              <?php else: ?>
                    <p><?php echo "Incorrect input!" ?></p>
              <?php endif;
            endif; ?>
                
        </div>
        <form method="get" action="03-CalculateInterest.php">
            <label for="amount">Enter Amount</label>
            <input type="text" name="amount" id="amount" /><br />
            <input type="radio" name="currency" value="$" id="usd"/>
            <label for="usd">USD</label>
            <input type="radio" name="currency" value="EUR" id="eur"/>
            <label for="eur">EUR</label>
            <input type="radio" name="currency" value="BGN" id="bgn"/>
            <label for="bgn">BGN</label><br />
            <label for="interest">Compound Interest Amount</label>
            <input type="text" name="interest" id="interest" /><br />
            <select name="maturity">
                <option value="6">6 months</option>
                <option value="12">1 year</option>
                <option value="24">2 years</option>
                <option value="60">5 years</option>
            </select>
            <input type="submit" value="Calculate" />
        </form>
    </body>
</html>
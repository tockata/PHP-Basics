<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Information Table</title>
        <style>
            table, tr, td {
                border: 1px solid black;
                border-collapse: collapse;
                padding: 5px;
            }
            
            tr td:first-of-type {
                font-weight: bold;
                background-color: orange;
            }
            
            tr td:last-of-type {
                text-align: right;
            }
        </style>
    </head>
    <body>
        <?php
        $firstTable = array('Name' => 'Gosho', 'Phone number' => '0882-321-423', 'Age' => '24', 'Address' => 'Hadji Dimitar');
        $secondTable = array('Name' => 'Pesho', 'Phone number' => '0884-888-888', 'Age' => '67', 'Address' => 'Suhata Reka');
        
        //print first table
        echo "<table>";
        foreach ($firstTable as $key => $value) {
            echo "<tr>";
            echo '<td>' . $key . '</td>';
            echo '<td>' . $value . '</td>';
            echo "</tr>";
        }
        echo "</table>";
        
        echo "<br>";
        
        //print second table
        echo "<table>";
        foreach ($secondTable as $key => $value) {
            echo "<tr>";
            echo '<td>' . $key . '</td>';
            echo '<td>' . $value . '</td>';
            echo "</tr>";
        }
        echo "</table>";
        ?>
    </body>
</html>
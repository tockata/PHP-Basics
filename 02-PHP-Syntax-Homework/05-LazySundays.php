<?php
$startDate = new DateTime('01-12-2014');
$endDate = new DateTime('31-12-2014');

while ($startDate <= $endDate) {
    $dateString =$startDate->format('d-m-Y') . "\n"; 
    $dayOfWeek = date('N', strtotime($dateString));
    if ($dayOfWeek == '7') {
        echo date_format($startDate, 'jS F, Y');
        echo "\n";
    }
	$startDate->add(new DateInterval('P1D'));
}
?>
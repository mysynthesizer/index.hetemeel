rty
<?php
$file=fopen('rates.txt', a);
fwrite($file, 'rty');
$json = file_get_contents('https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?json');
$j=json_decode($json);
echo $j[25]->{"rate"};
?>
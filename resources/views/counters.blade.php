
<?php
//proses
$i = include ('counter.txt')
// $filecounter=('counter.txt');
$kunjungan=file($i);
$kunjungan[0]++;
$file=fopen($i,"w");
fputs($file,"$kunjungan[0]");
fclose($file);
?>

<?php 
$n1=50;
$n2=30;
$n3=20;
echo "<h1>";
echo $n1>$n2 && $n1>$n3 ? " N1 is largest number"  : ($n2>$n1 && $n2>$n3 ? "N2 is largest number"  : ($n3>$n1 && $n3>$n2 ? " N3 is largest number" : "Enter a correct value"));
?>

<?php 
$p=1000;
$r=5;
$t=3;
$si=($p*$r*$t)/100;
echo "<h1 style='color:red;'>Principle is : ".$p;
echo "<h1 style='color:blue;'>Rate is : ".$r;
echo "<h1 style='color:green;'>Time is : ".$t;

echo "<h1 style='color:brown;'>Simple Interest is : ".$si;
$ci=$p*pow(1+$r/100,$t)-$p;
echo "<br>";
echo "<h1 style='color:green;'>Compound Interest is : ".$ci;
?>


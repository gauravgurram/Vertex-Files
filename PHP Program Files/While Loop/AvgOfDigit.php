<?php
$sum=0;
$avg=0;
$n=20;
$t=$n;
echo "<h1>";
while($n!=0)
{
    $sum=$sum+$n;
    $n=$n-1;
}

$avg=($sum/$t);
echo "The sum is : ".$sum;
echo "<br>";
echo "The avg is : ".$avg;

?>
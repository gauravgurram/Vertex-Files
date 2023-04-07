<?php

$num=123;
$temp=$num;
$rem=0;
$rev=0;
while($num>1)
{
    $rem=$num%10;
    $rev=($rev*10)+$rem;
    $num=(int)$num/10;
}
echo $rev." is the reverse of ".$temp;
?>




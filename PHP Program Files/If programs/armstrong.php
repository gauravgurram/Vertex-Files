<?php

$num=153;
$temp=$num;
$rem=0;
$rev=0;
while($num>1)
{
    $rem=$num%10;
    $rev=$rev+($rem*$rem*$rem);
    $num=(int)$num/10;
}
if($temp==$rev)
{
    echo "The number is armstrong as : ".$temp." and ".$rev;
}
else
{
    echo "Number is not armstrong";
}
?>
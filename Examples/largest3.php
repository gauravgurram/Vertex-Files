<?php 
$num1=10;
$num2=25;
$num3=20;
if($num1>$num2 && $num1<$num3)
{
    echo $num1." is the largest number!!!";
}
else if ($num2>$num3 && $num2>$num1)
{
    echo $num2." is the largest number!!! ";
}
else
{
    echo $num3." is the largest number!!! ";
}
?>

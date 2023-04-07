<?php

$num=4;
$flag=false;
for($i=2;$i<=($num/2);$i++)
{
    if($num%$i==0)
    {
        $flag=true;
        break;
    }
}
if($flag==true)
{
    echo $num." is not prime number";
}
else
{
    echo $num." is prime number";
}
?>
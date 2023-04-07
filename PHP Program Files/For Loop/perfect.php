<?php
$num=28;
$count=1;
$sum=0;
while($count<$num)
{
    if($num%$count==0)
    {
        $sum=$sum+$count;
    }
    $count=$count+1;
}
if($sum==$num)
{
    echo $num." is a perfect number";
}
else
{
    echo $num." is a not perfect number";
}
?>


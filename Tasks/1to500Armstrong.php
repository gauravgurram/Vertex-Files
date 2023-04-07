<?php
$num=500;
$temp=$num;
$rem=0;
$rev=0;
for($i=1;$i<=$num;$i++)
{
    $num1=$i;
    $temp=$num1;
    while($num1>1)
    {
        $rem=$num1%10;
        $rev=$rev+($rem*$rem*$rem);
        $num1=(int)$num1/10;
    }
    if($temp==$rev)
    {
        echo "The number is armstrong as : ".$temp." and ".$rev."<br>";
    }
    $rev=0;
}

?>


    
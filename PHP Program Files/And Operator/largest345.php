<?php 
$n1=10;
$n2=20;
$n3=30;
$n4=50;
$n5=40;
echo "<h1>";
if($n1>$n2 && $n1>$n3 && $n1>$n4 && $n1>$n5)
{
    echo "The N1 is greater than all";
}
elseif($n2>$n3 && $n2>$n4 && $n2>$n5 && $n2>$n1)
{
    echo "The N2 is greater than all";
}
elseif($n3>$n1 && $n3>$n2 && $n3>$n4 && $n3>$n5)
{
    echo "The N3 is greater than all";
}
elseif($n4>$n1 && $n4>$n2 && $n4>$n3 && $n4>$n5)
{
    echo "The N4 is greater than all";
}
else
{
    echo "The N5 is greater than all";
}
?>
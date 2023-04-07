<?php 
$n1=20;
$n2=40;
$n3=30;
echo "<h1>";
if($n1>$n2)
{
    if($n1>$n3)
    {
        echo "N1 is greater";
    }
}
if($n2>$n3)
{
    if($n2>$n1)
    {
        echo "N2 is greater";
    }
}
if($n3>$n1)
{
    if($n3>$n2)
    {
        echo "N3 is greater";
    }
}
?>
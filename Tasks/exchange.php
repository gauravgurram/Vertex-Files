<?php 
$arr2=array(['🚩','🚩','🚩'],['🚩','🚩','🚩'],['🚩','🚩','🚩']);
$arr1=array(['☕','☕','☕'],['☕','☕','☕'],['☕','☕','☕']);
$arr3=array();

$arr3=$arr1;
$arr1=$arr2;
$arr2=$arr3;

for ($i=0;$i<count($arr1);$i++)
{
    for ($j=0;$j<count($arr2);$j++)
    {
       echo " ". $arr1[$i][$j];

    }
    echo "<br>";
}
?>
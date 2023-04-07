<?php 

$sum=0;
$arr1=array(1,2,3,4,5);
$arr2=array(6,7,8,9,10);
$arr3=array();
for ($i=0;$i<count($arr1);$i++)
{
    echo $arr1[$i];
}
echo "<br>";

for ($i=0;$i<count($arr2);$i++)
{
   echo $arr2[$i];
}


$arr3=$arr1;
$arr1=$arr2;
$arr2=$arr3;
echo "<br>";
echo "<br>";
echo "<br>";

for ($i=0;$i<count($arr1);$i++)
{
    echo $arr1[$i];
}
echo "<br>";

for ($i=0;$i<count($arr2);$i++)
{
   echo $arr2[$i];
}



?>
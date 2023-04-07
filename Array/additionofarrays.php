<?php
$arr1=array(1,2,3,4,5);
$arr2=array(6,7,8,9,10);
$arr3=array();

for ($i=0;$i<count($arr1);$i++) 
{
    array_push($arr3,$arr1[$i]+$arr2[$i]);
}

echo "The addition of array is  : ";
for ($i=0;$i<count($arr3);$i++) 
{
   echo $arr3[$i]." ";
}
?>
<?php 

$sum=0;
$arr=array(1,2,3,4,5,6);
for($i=0;$i<count($arr);$i++)
{
    $sum=$sum+$arr[$i];
}
echo "The sum of array is : ".$sum;
echo "<br>";
echo "The average of array is : ".$sum/count($arr);
?>
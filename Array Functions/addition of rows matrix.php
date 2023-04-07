<?php 

$arr1=array([1,2,3],[4,5,6],[7,8,9]);
$sum=0;

echo "Addition of rows in a matrix";
echo "<br>";

for ($i=0;$i<count($arr1);$i++)
{   $sum=0;
    for($j=0;$j<count($arr1);$j++)
    {
        echo " ".$arr1[$i][$j];
        $sum=$sum+$arr1[$i][$j];
    }  
    echo " 🚩".$sum;
    echo "<br>";
}
echo "<br>";
$sum2=0;
$sum3=0;
$sum4=0;
echo "Addition of column in a matrix";

echo "<br>";
for ($i=0;$i<count($arr1);$i++)
{   $sum=0;
    for($j=0;$j<count($arr1);$j++)
    {
        echo " ".$arr1[$i][$j];
        if($j==0)
        {
            $sum2=$sum2+$arr1[$i][$j];
        }
        if($j==1)
        {
            $sum3=$sum3+$arr1[$i][$j];
        }
        if($j==2)
        {
            $sum4=$sum4+$arr1[$i][$j];
        }
    }  
    echo "<br>";
}

echo "<br>";
echo "😂".$sum2;
echo "😂".$sum3;
echo "😂".$sum4;

echo "<br>";



?>
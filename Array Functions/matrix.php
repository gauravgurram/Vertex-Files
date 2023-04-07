<?php 

$arr1=array([1,2,3],[4,5,6],[7,8,9]);
$arr2=array([1,2,3],[4,5,6],[7,8,9]);
$arr3=array();
echo "First Matrix";
echo "<br>";

for ($i=0;$i<count($arr1);$i++)
{
    for($j=0;$j<count($arr1);$j++)
    {
        echo " ".$arr1[$i][$j];
    }  
    echo "<br>";
}
echo "<br>";


echo "Second Matrix";
echo "<br>";

for ($i=0;$i<count($arr2);$i++)
{
    for($j=0;$j<count($arr2);$j++)
    {
        echo " ".$arr1[$i][$j];
    }  
    echo "<br>";
}

echo "<br>";

for ($i=0;$i<count($arr2);$i++)
{
    for($j=0;$j<count($arr2);$j++)
    {
        for ($k=0;$k<count($arr2);$k++)
        {
            $arr3[$i][$j]=$arr1[$i][$j]+$arr2[$i][$j];
        }

    }  
  
}
echo "Addition of Matrix is  : ";
echo "<br>";

for ($i=0;$i<count($arr3);$i++)
{
    for($j=0;$j<count($arr3);$j++)
    {
        echo "&emsp;".$arr3[$i][$j];
    }  
    echo "<br>";
}







?>
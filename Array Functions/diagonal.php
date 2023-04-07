<?php 
echo "Right Diagonal Matrix<br>";
$gfg=array([1,2,3],[4,5,6],[7,8,10]);
$sum1=0;
for ($i=0;$i<3;$i++)
{  
    for ($j=0;$j<3;$j++)
    {
        echo "&nbsp;&nbsp;&nbsp;";
        echo " ". $gfg[$i][$j];
        
    }    
echo "<br>";
}
echo "The Matrix is : ".$sum1;
echo "<br>";

$sum=0;
for ($i=0;$i<3;$i++)
{  
    for ($j=0;$j<3;$j++)
    {
        echo "&nbsp;&nbsp;&nbsp;";
        if($gfg[$i]==$gfg[$j])
        {
            $sum=$sum+$gfg[$i][$j];
            echo " ". $gfg[$i][$j];
        }    
    }    
echo "<br>";
}
echo "The sum of right diagonals is : ".$sum;
echo "<br>";
echo "<br>";



$sum6=0;
for ($i=0;$i<3;$i++)
{  
    for ($j=0;$j<3;$j++)
    {
        echo "&nbsp;&nbsp;&nbsp;";
        if($i+$j==2)
        {
            $sum6=$sum6+$gfg[$i][$j];

            echo " ". $gfg[$i][$j];
        }    
    }    
echo "<br>";
}
echo "The sum of right diagonals is : ".$sum6;
echo "<br>";
echo "<br>";
?>
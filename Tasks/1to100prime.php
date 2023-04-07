<?php
$num=100;

for($i=2;$i<$num/2;$i++)
{
    for($j=$i;$j<=$i;$j++)
    {
        if($i%$j==0)
        {
            $count=1;
        }
        if($count=2)
        {
            echo $j." ";
            
        }
    }

}

?>
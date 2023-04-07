<?php 
$n=5;
for ($i=0;$i<$n;$i++)
{
   for($j=2*($n-$i);$j>=0;$j--)
   {
    echo "&nbsp;&nbsp;";
   }
    for ($j=0;$j<=$i;$j++)
    {
        echo " * ";
    }
    echo "<br>";
}

?>
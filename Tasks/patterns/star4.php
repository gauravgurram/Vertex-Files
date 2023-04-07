<?php 
$n=5;
for ($i=5;$i>=0;$i--)
{
   for($j=2*($n-$i);$j>=0;$j--)
   {
    echo "&nbsp;";
   }
    for ($j=0;$j<=$i;$j++)
    {
        echo "* ";
    }
    echo "<br>";
}

?>
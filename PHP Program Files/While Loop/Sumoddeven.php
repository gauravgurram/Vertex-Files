<?php
$sumodd=0;
$sumeven=0;
$n=20;
echo "<h1>";
while($n!=0)
{
    if($n%2==0)
    {
        $sumeven=$sumeven+$n;
    }
    else
    {
        $sumodd=$sumodd+$n;
    }
   
    $n=$n-1;
}
echo "The sum of even nos. is : ".$sumeven;
echo "<br>";
echo "The sum of odd nos. is : ".$sumodd;
?>
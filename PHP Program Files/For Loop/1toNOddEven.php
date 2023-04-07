<?php 
$n=20;
for ($i=1; $i<=$n; $i++)
{
    if($i%2==0)
    {
        echo "Even No.".$i."<br>";
    }
}
echo "<br>";
for ($i=1; $i<=$n; $i++)
{
    if($i%2!=0)
    {
        echo "Odd No.".$i."<br>";
    }
}
?>
<?php 
$age=15;
echo "<h1>";
if($age>0 and $age<=12)
{
    echo "Child";
}
elseif($age>=13 && $age<=18)
{
    echo "Teenage";
}
elseif($age>=19 && $age<=64)
{
    echo "Adult";
}
else
{
    echo "Senior Citizen";
}
?>
<?php 
$per=85;
echo "<h1>";
if($per>=75 && $per<=100)
{
    echo "Distinction";
}
elseif($per>=60 && $per<=74)
{
    echo "First Class";
}
elseif($per>=45 && $per<=59)
{
    echo "Second Class";
}
elseif($per>=35 && $per<=44)
{
    echo "Pass";
}
else{
    echo "Fail";
}
?>
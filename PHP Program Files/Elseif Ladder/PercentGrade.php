<?php 
$per=65;
echo "<h1>";
if($per>=75)
{
    echo "Grade A";
}
elseif($per>=65)
{
    echo "Grade B";
}
elseif($per>=55)
{
    echo "Grade C";
}
elseif($per>=40)
{
    echo "Grade D";
}
else
{
    echo "Grade E";
}
?>
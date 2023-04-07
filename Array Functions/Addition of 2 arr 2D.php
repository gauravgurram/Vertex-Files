<?php 
$cars=array(
    array(1,2,3,4,5),
    array(1,2,3,4,5)
);
$c=array();
for($i=0;$i<count($cars[0]);$i++)
{   
    for ($j=0;$j<count($cars[1]);$j++)
        {
            $c[0][$i]=$cars[0][$i]+$cars[1][$i];   
            break;
        }
}

for ($i=0;$i<count($c);$i++)
{
    print_r($c[$i]);
    echo "<br>";
}
?>
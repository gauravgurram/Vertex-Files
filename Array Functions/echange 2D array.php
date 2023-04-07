<?php 
$cars=array(
    array(1,2,3,4,5),
    array(6,7,8,9,10)
);
$temp=array();

$temp=$cars[0];
$cars[0]=$cars[1];
$cars[1]=$temp;

print_r($cars[0]);
echo "<br>";
print_r($cars[1]);

?>
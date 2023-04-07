<?php 
$arr=array(10,20,30);
array_shift($arr);
for($i=0;$i<count($arr);$i++)
{
    echo $arr[$i],",";
}
?>

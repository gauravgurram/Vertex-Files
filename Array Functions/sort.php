<?php 

$arr=array(3,4,5,2,3,5,7,8,54,3,2,4);
sort($arr);
echo "Sorted Array : ";
for($i=0;$i<count($arr);$i++)
{
    echo  $arr[$i];
}
?>
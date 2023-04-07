<?php 
$arr=array(3,4,5,2,3,5,7,8,54,3,2,4);
rsort($arr);
echo "Array in decending order : ";
for($i=0;$i<count($arr);$i++)
{
    echo  $arr[$i];
}
?>
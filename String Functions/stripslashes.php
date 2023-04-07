<?php 
$str="Hello'world";
$str1=addslashes($str);
echo $str1;
echo stripslashes($str);
?>
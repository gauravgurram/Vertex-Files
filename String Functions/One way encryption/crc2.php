<?php 
$str="Gaurav";
$crc=crc32($str);
echo decbin($crc);
?>
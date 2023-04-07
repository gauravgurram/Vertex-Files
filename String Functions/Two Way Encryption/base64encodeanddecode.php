<?php 
$str="Abhishek Dasari ";
$encoded=base64_encode($str);
echo $encoded;
echo "<br>";
$decoded=base64_decode($encoded);
echo $decoded;
?>
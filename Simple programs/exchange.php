<?php 
$a=20;
$b=30;
echo "<h1 style='color:red;'>The values before exchange are A : ".$a." B : ".$b;
$a=$a+$b;
$b=$a-$b;
$a=$a-$b;
echo "<h1 style='color:green;'>The values after exchange are A : ".$a." B : ".$b;
?>

<?php 
$ch="three";
echo "<h1>";
switch($ch)
{
    case "one": echo 1;
            break;
    case "two": echo 2;
            break;
    case "three" : echo 3;
            break;
    case "four" : echo 4;
            break;
    case "five" : echo 5;
            break;
    default: echo "Enter a value between 1 and 5";
}
?>
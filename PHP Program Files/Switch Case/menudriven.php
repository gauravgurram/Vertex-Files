<?php 
$n1=20;
$n2=30;
$ch=3;
echo "<h1>";
switch($ch)
{
    case 1: echo "Addition is : ".($n1+$n2);
            break;
    case 2: echo "Substraction is : ".($n1-$n2);
            break;
    case 3: echo "Multiplication is : ".($n1*$n2);
            break;
    case 4: echo "Division is : ".($n1/$n2);
            break;
    case 5: echo "Modulus is : ".($n1%$n2);
            break;
    default : echo "Enter value between 1 to 5";
}
?>
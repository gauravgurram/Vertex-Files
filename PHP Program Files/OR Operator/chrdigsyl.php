<?php 

$c="+";
if($c==is_numeric($c))
{
    echo "Number";
}
elseif($c==is_string($c))
{
    echo "Char or String";
}
elseif($c=="*" || $c=="+" || $c=="-" || $c=="~")
{
    echo "Symbol";
}
else
{
    echo "Enter correct character !!!";
}
?>
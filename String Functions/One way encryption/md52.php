<?php 
$str="Gaurav";
echo md5($str);
echo "<br>";
if(md5($str)=="6a2dcf3057ebd584e38278c8de63b341")
{
    echo "Data is matched with hash value";
}
else
{
    echo "Data is not matched with hash value";
}
?>
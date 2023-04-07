<?php 

$arr=array(1,2,3,4,5,6,7,8,9,10,11);
$even=0;
$odd=0;
for($i=0;$i<count($arr);$i++)
{
    if($arr[$i]%2==0)
    {
        $even=$even+1;
    }
    else
    {
        $odd=$odd+1;
    }
}

echo "The count of even elements  is : ".$even."<br>";
echo "The count of odd elements is : ".$odd;


?>
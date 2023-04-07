<?php 
$arr=array(1,2,3,4,5,6,7,8,9,10);
$even=0;
$odd=0;
for($i=0;$i<count($arr);$i++)
{
    if($arr[$i]%2==0)
    {
        $even=$even+$arr[$i];
    }
    else
    {
        $odd=$odd+$arr[$i];
    }
}
echo "The sum of even elements  is : ".$even."<br>";
echo "The sum of odd elements is : ".$odd;
?>
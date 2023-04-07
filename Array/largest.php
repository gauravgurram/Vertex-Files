
<?php 
$large=0;
$arr=array(1,2,3,4,5,6);
for ($i=0;$i<count($arr);$i++)
{
    for($j=0;$j<count($arr);$j++)
    if($arr[$i]>$arr[$j])
    {
        $large=$arr[$i];
    }
}
echo "The largest no. is : ".$large;
?>
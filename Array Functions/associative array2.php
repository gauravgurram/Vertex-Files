<?php 

$arr=array("Gaurav"=>35,"Prasad"=>36,"Abhishek"=>37,"Gana"=>38);

print_r($arr);
echo "<br>";

foreach ($arr as $k=>$v) {

echo $k." ".$v."<br>";
}

echo "<br>";

echo $arr['Gaurav'];
?>
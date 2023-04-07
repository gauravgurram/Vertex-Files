<?php 
$eng=$_POST['eng'];
$geog=$_POST['geog'];
$math=$_POST['maths'];
$hist=$_POST['hist'];
$sci=$_POST['sci'];
$pt=$_POST['pt'];

$total=$eng+$geog+$sci+$math+$pt+$hist;

$percent=($total/600)*100;

$grade="";
if($percent>=75 && $percent<=100)
{
    $grade="A";
}
elseif($percent>=60 && $percent<=74)
{
    $grade="B";
}
elseif($percent>=45 && $percent<=59)
{
    $grade="C";
}
elseif($percent>=35 && $percent<=44)
{
    $grade="D";
}
else{
    $grade="E";
}

echo "<table border='1' rules='all' align='center' bgcolor='yellow'>";
echo "<tr><th colspan='2'>STUDENTS MARKSHEET</th></tr>";
echo "<tr><td>ENGLISH</td><td align='center'>".$eng."</td></tr>";
echo "<tr><td>SCIENCE</td><td align='center'>".$sci."</td></tr>";
echo "<tr><td>MATHS</td><td align='center'>".$math."</td></tr>";
echo "<tr><td>HISTORY</td><td align='center'>".$hist."</td></tr>";
echo "<tr><td>GEOGRAPHY</td><td align='center'>".$geog."</td></tr>";
echo "<tr><td>SLEEP</td><td align='center'>".$pt."</td></tr>";
echo "<tr><td align='center'>TOTAL</td><td align='center'>".$total." / 600</td></tr>";
echo "<tr><td align='center'>PERCENTAGE</td><td align='center'>".round($percent)."%</td></tr>";

echo "<tr><td align='center'>GRADE</td><td align='center'>".$grade."</td></tr>";

echo "</table>";


echo "<input type='submit' name='submit' value='Click here'>";

?>
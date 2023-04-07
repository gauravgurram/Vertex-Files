<?php 
$username="root";
$password="";
$database="sample";
$conn=mysqli_connect("localhost",$username,$password,$database);
if($conn)
{
    echo "Database connected successfully <br>";
}
else
{
    echo "Database connection failed";
}

$name="Gana";
$mobile="123456";
$prevname="Gaurav";
$query="UPDATE vertex SET 'name'=$name,'mobile'=$mobile WHERE 'name'=$prevname";
if(mysqli_query($conn,$query))
{
    echo "Data Updated successfully!!!";
}
else
{
    echo "Data Updated failed";
}
mysqli_close($conn);
?>
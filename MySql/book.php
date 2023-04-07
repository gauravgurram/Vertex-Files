<?php
$con=mysqli_connect("localhost","root","","mydatabase");
if($con)
{
    echo"<h3>connect!</h3>";
}
else
{
    echo"<h3>Not Connect!</h3>";
}
$sql="create table Book(B_ID int, Name varchar(100),Author varchar(50),Date_Publishing date,Publisher_Name varchar(50))";
$check=mysqli_query($con,$sql);
if($check)
{
    echo"<h3>Table Create</h3>";
}
else
{
    echo"<h3>Table is Not Create</h3>";
}
?>
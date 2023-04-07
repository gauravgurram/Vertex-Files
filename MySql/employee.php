<?php
$con=mysqli_connect("localhost","root","","mydatabase");
if($con)
{
    echo"<h3>Connect!</h3>";
}
else
{
    echo"<h3>Not Connect!</h3>";
}
$sql="create table employee(Eid int,
Name varchar(50),
Date_join date,
Role varchar(10),
Division Varchar(5))";
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
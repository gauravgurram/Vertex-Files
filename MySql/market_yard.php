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
$sql="create table Market_Yard(Item varchar(50),Quantity int,Cost_prise decimal(10.2),Selling_prise decimal(10,2),Profit decimal(10,2))";
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
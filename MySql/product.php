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
$sql="create table Product(ID int,
                            Name varchar(50),
                            Price Decimal(10,2),
                            M_Date date)";
$check=mysqli_query($con,$sql);
if($check)
{
    echo"<h3>Tabel create</h3>";
}
else{
    echo"<h3>Table is not Create</h3>";
}
?>
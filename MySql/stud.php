<?php
$con=mysqli_connect("localhost","root","","mydatabase");
if($con)
{
    echo"<h1>Connect!</h1>";
}
else{
    echo"<h1>Not Connect!</h1>";
}
$sql="create table Stud(Name varchar(50),
                        Roll int,
                        Percentage double)";
    $check=mysqli_query($con,$sql);
    if($check)
    {
        echo"<h1>Table is created Successfully!";
    }
    else
    {
        echo"<h1>Table is not created Successfully!!";
    }
?>
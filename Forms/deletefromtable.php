<?php 
require('config.php');
$id=$_GET['id'];
$sql="delete from registration where id='$id'";
if(mysqli_query($con,$sql))
{
    header('location:fetch1.php');
}
else
{
    echo "Error";
}
?>
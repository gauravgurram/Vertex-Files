<?php 
require('config.php');
$id=$_GET['id'];
$sql="delete from productdetails where id='$id'";
if(mysqli_query($con,$sql))
{
    header('location:fetch.php');
}
else
{
    echo "Error";
}
?>
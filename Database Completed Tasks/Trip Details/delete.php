<?php 
require('config.php');
$id=$_GET['id'];
$sql="delete from tripdetails where id='$id'";
if(mysqli_query($con,$sql))
{
    header('location:fetch.php');
}
else
{
    echo "Error";
}
?>
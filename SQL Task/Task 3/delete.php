<?php 
$con=mysqli_connect("localhost","root","","sample");
$id=$_GET['id'];
$sql="delete from product where id='$id'";
if(mysqli_query($con,$sql))
{
    header('location:productcrud.php');
}
else
{
    echo "Error";
}
?>
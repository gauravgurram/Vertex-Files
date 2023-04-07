<?php 
$username=$_REQUEST['username'];
$password=$_REQUEST['password'];
$user="root";
$pass="";
$database="sample";
$con=mysqli_connect("localhost",$user,$pass,$database);
if($con)
{
    echo "Connected to database";
}
else
{
    echo "Unable to connect to database";
}

if($username=="ganagurram" && $password=="gana123")
{
    $query="insert into login(username,password_c) values('$username','$password')";
    mysqli_query($con,$query);
    echo "<body bgcolor='green'><h1 style='color:white; text-align:center;'>Login Successful</body>";

}
else
{
    echo "<body bgcolor='red'><h1 style='color:white; text-align:center;'>Login Failed</body>";
}

?>0
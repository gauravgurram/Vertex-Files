<?php 
    $username="root";
    $password="";
    $database="sample";
    $conn=mysqli_connect("localhost",$username,$password,$database);
    if($conn)
    {
        echo "The Database Connection Is Successfully Established";
    }
    else
    {
        echo "Connection Failed";
    }
    $query="create table vertex(name varchar(255),mobile int(10))";
    mysqli_query($conn,$query);
    mysqli_close($conn);
?>
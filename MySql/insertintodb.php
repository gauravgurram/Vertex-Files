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
    $query="insert into vertex(name,mobile) values ('Gaurav','8421789')";
    if(mysqli_query($conn,$query))
    {
        echo "Data Insert Successfully";
    }
    else
    {
        echo "Data Insert Failed";
    }
    mysqli_close($conn);
?>
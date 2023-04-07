<?php 
    $user="root";
	$pass="";
	$db="sample";
	$conn=mysqli_connect("localhost",$user,$pass,$db);
    $roll=36;
    $name="Gaurav";
    if($conn)
    {
        echo "Successfully connected !!!";
    }
    else{
        echo "Not Connected !!!";
    }
    $query="insert into test (Roll,Name) values('$roll','$name')";
    mysqli_query($conn,$query);
    mysqli_close($conn);
?>
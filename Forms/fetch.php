<?php
require('config.php');
if($con){
    echo "<script>alert('Connected')</script>";
}
else
{
    echo "The database is not connected";
}

$sql="select * from registration";
$rs=mysqli_query($con,$sql);
echo "<h1 style='text-align:center; margin-top:2%; color:green; text-decoration:underline;'>Data Fetched From Database</h1>";
echo "<table border='1'  align='center' style='text-align:center; width:80%; height:30%;background-color: greenyellow; color:green; margin-top:5%;'>";
while($rw=mysqli_fetch_row($rs))
{echo "<tr><th>First Name</th><th>Middle Name</th><th>Last Name</th><th>Email ID</th><th>Phone No. </th><th>Address</th><th>Course</th><th>Password</th><th>Confirm Password</th><th>Choose</th></tr>";

echo "<tr><td>".$rw[0]."</td><td>".$rw[1]."</td><td>".$rw[2]."</td><td>".$rw[3]."</td><td>".$rw[4]."</td><td>".$rw[5]."</td><td>".$rw[6]."</td><td>".$rw[7]."</td><td>".$rw[8]."</td></tr>";
}
echo "</table>";

// echo "First Name : ".$rw[0]."<br>";
// echo "Middle Name : ".$rw[1]."<br>";
// echo "Last Name : ".$rw[2]."<br>";
// echo "Email : ".$rw[3]."<br>";
// echo "Phone : ".$rw[4]."<br>";
// echo "Address : ".$rw[5]."<br>";
// echo "Course: ".$rw[6]."<br>";
// echo "Password: ".$rw[7]."<br>";
// echo  "Confirm-Password : ".$rw[8]."<br>";

?> 
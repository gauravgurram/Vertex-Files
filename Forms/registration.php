<?php 
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
$course=$_POST['course'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$email=$_POST['email'];
$password1=$_POST['password1'];
$password2=$_POST['password2'];
$user="root";
$pass="";
$database="sample";
$conn=mysqli_connect("localhost",$user,$pass,$database);
if($conn)
{
    echo "connected successfully!!!";
}
else{
    echo "failed to connect";
}
$query="insert into registration(First_Name,Middle_Name,Last_Name,Email_ID,Phone_No,Address_P,Course,Password1,Password2)values('$fname', '$mname', '$lname','$email', '$phone', '$address', '$course', '$password1','$password2')";
if(mysqli_query($conn,$query))
{
    echo "Data Inserted Successfully";
}
else
{
    echo "Data Insert Failed".mysqli_error($conn);
}
mysqli_close($conn);
echo "<table border='1' rules='all' align='center' bgcolor='yellow'>";
echo "<tr><th colspan='2'>DATA OF STUDENTS REGISTRATION</th></tr>";
echo "<tr><td>First Name</td><td align='center'>".$fname."</td></tr>";
echo "<tr><td>Middle Name</td><td align='center'>".$mname."</td></tr>";
echo "<tr><td>Last Name</td><td align='center'>".$lname."</td></tr>";
echo "<tr><td>Course</td><td align='center'>".$course."</td></tr>";
echo "<tr><td>Address</td><td align='center'>".$address."</td></tr>";
echo "<tr><td>Email</td><td align='center'>".$email."</td></tr>";
echo "<tr><td>Phone</td><td align='center'>".$phone."</td></tr>";
echo "<tr><td>Password</td><td align='center'>".$password1."</td></tr>";
echo "<tr><td>Retype Password</td><td align='center'>".$password2."</td></tr>";
echo "</table>";
echo "<a href='fetch1.php'>Click Here To Fetch All The Data From Database</a>";
?>  
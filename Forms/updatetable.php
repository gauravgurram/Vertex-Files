<?php 
require('config.php');
$id=$_GET['id'];
$sql="select * from registration where id='$id';";
$rs=mysqli_query($con,$sql);
$rw=mysqli_fetch_row($rs);
?>
<html>
<head>
    <title>
        Update Table 
    </title>
</head>
<body>
    <form method="POST">
    First Name : <input type="text" name="fname" value="<?php echo $rw[1] ?>"><br><br>
    Middle Name : <input type="text" name="mname" value="<?php echo $rw[2] ?>"><br><br>
    Last Name : <input type="text" name="lname" value="<?php echo $rw[3] ?>"><br><br>
    Email ID: <input type="text" name="email" value="<?php echo $rw[4] ?>"><br><br>
    Phone Number : <input type="tel" name="phone" value="<?php echo $rw[5] ?>"><br><br>
    Address : <input type="text" name="address" value="<?php echo $rw[6] ?>"><br><br>
    Course : <select name="course1" >
                        <option name="C" value="C" selected='<?php echo $rw[7]?>'>C</option>
                        <option name="C++" value="C++" selected='<?php echo $rw[7]?>'>C++</option>
                        <option name="Java" value="Java" selected='<?php echo $rw[7]?>'>Java</option>
                        <option name="Python" value="Python" selected='<?php echo $rw[7]?>'>Python</option>
                    </select><br><br>
    Password : <input type="text" name="password1" value="<?php echo $rw[8] ?>"><br><br>
    Confirm_Password : <input type="text" name="password2" value="<?php echo $rw[9] ?>"><br><br>
    <input type="submit" name="btn" value="Update" >
</body>
</html>

<?php
if(isset($_POST['btn']))
{
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$course=$_POST['course1'];
$password1=$_POST['password1'];
$password2=$_POST['password2'];

$sql1="update registration set First_Name='$fname', Middle_Name='$mname', Last_Name='$lname', Email_ID='$email', Course='$course',
        Address_P='$address',Password1='$password1',Password2='$password2',Phone_No='$phone' where id='$id'";
if(mysqli_query($con,$sql1))
{
    header('location:fetch1.php');
}
else
{
    echo "Error".mysqli_error($con);
}
}
?>
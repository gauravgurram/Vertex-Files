<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <style>
        .main{
            border-style: solid;
            border-color: black;
            margin: auto;
            width:30%;
            height:80%;
            text-align: center;
            border-radius: 15px;
            background-color: aquamarine;
        }

        input[type=text]{
            width:auto;
            height: auto;
            margin: auto;
            border-radius: 5px;
        }
        input[type=email]{
            width:auto;
            height: auto;
            margin: auto;
            border-radius: 5px;
        }
        input[type=password]{
            width:auto;
            height: auto;
            margin: auto;
            border-radius: 5px;
        }
        select{
            width:90%;
            border-color: black     ;
            height: auto;
            margin: auto;
            border-radius: 5px;
        }
        table{
            margin: auto;
            padding: 3%;
        }
        tr,td{
            padding:2%;
            width: 35%;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
        }
        h1{

            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            font-style: normal;
            text-decoration: underline;
            color:darkgreen;
        }
        input[type=submit]
        {
            border-radius:5px;
            width:30%;
            background-color: darkgreen;
            font-size: large;
            font-weight: bold;
            border-style: none;
            color: aliceblue;
            height: 40px;
        }
    </style>
</head>
<body>
    <form method="post" action ="registration.php">
        <div class="main">
            <h1>Registration</h1>
            <table>
                <tr>
                    <td>First Name</td>
                    <td><input type="text" name="fname" required></td>
                </tr>
            
                <tr>
                    <td>Last Name</td>
                    <td><input type="text" name="lname" required></td>
                </tr>
                <tr>
                    <td>Phone Number</td>
                    <td><input type="text" name="phone" required></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="email" name="email" required>
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password1" required></td>
                </tr>
                <tr>
                    <td>Re-type Password</td>
                    <td><input type="password" name="password2" required></td>
                </tr>
            </table><br>
            <input type="submit" name="submit" value="REGISTER"><br><br>
        </div>
    </form>
</body>
</html>
<?php
$con=mysqli_connect("localhost","root","","sqltasks");
if(isset($_POST['submit']))
{
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$password1=$_POST['password1'];
$password2=$_POST['password2'];
$sql="select email,phone_no from registration";
$rs=mysqli_query($con,$sql);
$rw=mysqli_fetch_row($rs);
if($email==$rw[0])
{
    echo "<script>alert('You have already registered with this email id');</script>";
} 
elseif($phone==$rw[1])
{
    echo "<script>alert('You have already registered with this email id and phone');</script>";
}
else
{
    $sql1="insert into registration (first_name,last_name,phone_no,email,password1,c_password) 
    values('$fname','$lname','$phone','$email','$password1','$password2')";
    if(mysqli_query($con,$sql1))
    {
        echo "<script>alert('Thank you for registering now you can login');</script>";
        header('location:Login Page.php');
    }
    else
    {
        echo mysqli_error($con);
    }    
}
}
?>
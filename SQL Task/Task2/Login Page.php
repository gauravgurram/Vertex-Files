<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>

        .main{
            border-style: solid;
            border-color: black;
            margin: auto;
            width:15%;
            height:80%;
            text-align: center;
            background-color: aqua;
        }

        input[type=text]{
            width:auto;
            height: auto;
            margin: auto;
        }
    </style>
</head>
<body>
    <form method="post">
        <div class="main">
            <h1>Login Page</h1>
            <input type="text" name ="username" placeholder="Username" required><br><br>
            <input type="password" name ="password" placeholder="Password" required><br><br>
            <input type="submit" name ="submit" value="Login"><br><br><br>
        </div>
    </form>
</body>
</html>
<?php
$con=mysqli_connect("localhost","root","","sqltasks");
if(isset($_POST['submit']))
{
$username=$_POST['username'];
$password=$_POST['password'];
$sql="select email,password1 from registration where email='$username'";
$rs=mysqli_query($con,$sql);
$rw=mysqli_fetch_row($rs);

if($username==$rw[0] && $password==$rw[1])
{
        echo "<script>alert('Login Successfully');</script>";
}
else
{
    echo "<script>alert('Login Failed Please Enter Valid Details!!!');</script>";
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/common.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/logo/vps_logo.jpg">
</head>
<body>
    <div class="container">
        <div class="row pt-5 mt-5">
            <div class="col-md-4 m-auto border shadow rounded my-5 py-3 p-4">
                    <h4 class="text-center montserrat-fnt">User Login</h4>
                    <div class="form-group text-center my-3">
                        <img src="../assets/logo/vps_logo.png" alt="VPS Logo" width="100" height="50">
                    </div>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username_txt" id="username_txt" placeholder="Username" class="form-control" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password_txt" id="password_txt" placeholder="Password" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="" id="showpassword">
                        <label for="showpassword">Show Password</label>
                    </div>

                    <div class="form-group text-end">
                        <a href="../"> Home </a>
                        <input type="submit" value="Login" name="login_btn" class="btn btn-success">
                    </div>
                </form>

            </div>
        </div>
    </div>

</body>
</html>

<?php
session_start();
include_once '../assets/db/db.php';
if(isset($_POST['login_btn'])){
    $usernm = mysqli_real_escape_string($conn, $_POST['username_txt']);
    $pass = mysqli_real_escape_string($conn, $_POST['password_txt']);
    $pass = md5($pass);
    $select_user = "select * from user where username='$usernm' and password='$pass'";
    $result = mysqli_query($conn, $select_user);
    $row = mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);
    if($count>0){
        $_SESSION['u_username']=$row['username'];
        header("Location: index");
    }else{
        echo '<div class="alert alert-danger">Username or Password Invalid!</div>';
    }
}
?>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
    $(document).ready(function(){

  $('#showpassword').on('click', function(){
     var passInput=$("#password_txt");
     if(passInput.attr('type')==='password')
       {
         passInput.attr('type','text');
     }else{
        passInput.attr('type','password');
     }
 })
})
</script>
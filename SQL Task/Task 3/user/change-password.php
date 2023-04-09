<?php
    $title = "Change Password";
    include_once 'header.php';
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 px-0">
<?php
    include_once 'sidebar.php';
?>
        </div>
        <div class="col-md-10 p-4">
            
<?php include_once 'breadcrump.php'; ?>

            <form action="" method="post">
                <div class="row shadow rounded my-4 mx-1 py-4 bg-white">
                    <div class="col-md-5 m-auto content">
                        <div class="form-group">
                            <label for="">Current Password</label>
                            <input type="password" name="currentpassword_txt" id="" placeholder="Current Password" class="form-control" autofocus required="">
                        </div>
                        <div class="form-group">
                            <label for="">New Password</label>
                            <input type="password" name="newpassword_txt" id="newpassword_txt" class="form-control" placeholder="New Password">
                        </div>
                        <div class="form-group">
                            <label for="">Confirm New Password</label>
                            <input type="password" name="confirmnewpassword_txt" id="confirmnewpassword_txt" class="form-control" placeholder="Confirm New Password">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Change Password" name="changepassword_btn" class="btn btn-success">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php

    if(isset($_POST['changepassword_btn'])){
        $user_username = $_SESSION['u_username'];
        $current_password = md5($_POST["currentpassword_txt"]);
        $new_password = md5($_POST["newpassword_txt"]);
        
        $select_password = mysqli_query($conn, "select username from user where username='$user_username' and password='$current_password'");
        $row = mysqli_fetch_array($select_password);
        if($row>0){
        $update_password = mysqli_query($conn,"update user set password='$new_password' where username='$user_username'");
        echo '<script>alert("Your password successully changed."); window.location.href="logout";</script>';
        }else{
        echo '<script>alert("Your current password is wrong.")</script>';
        }

    }
?>

<?php
    include_once 'footer.php';
?>
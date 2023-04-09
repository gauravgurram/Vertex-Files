<?php
    $title = "My Profile";
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

<?php
    $select_user = "select * from admin where username='{$_SESSION["a_username"]}'";
    $result = mysqli_query($conn, $select_user);  
    $data = mysqli_fetch_array($result);
?>

            <form action="" method="post">
                <div class="row shadow rounded my-4 mx-1 py-4 bg-white">
                    <div class="col-md-5 m-auto content">
                    <div class="form-group">
                            <label for="">Admin Id</label>
                            <input type="text" name="adminid_txt" id="" value="<?= $data['admin_id'] ?>" class="form-control" required="" readonly="true">
                        </div>
                    <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username_txt" id="" value="<?= $data['username'] ?>" class="form-control" required="" readonly="true">
                        </div>
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name_txt" id="" value="<?= $data['name'] ?>" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label for="">Email Id</label>
                            <input type="email" name="email_txt" id="" value="<?= $data['email_id'] ?>" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label for="">Mobile</label>
                            <input type="tel" name="mobile_txt" id="" value="<?= $data['mobile_no'] ?>" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <textarea name="address_txt" id="" cols="30" rows="3" class="form-control" required=""><?= $data['address'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Update" name="update_btn" class="btn btn-success">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if(isset($_POST['update_btn'])){
    $name = $_POST['name_txt'];
    $email = $_POST['email_txt'];
    $mobile = $_POST['mobile_txt'];
    $address = $_POST['address_txt'];

    $update_profile = "update admin set name='$name', email_id='$email', mobile_no='$mobile', address='$address' where username='{$_SESSION["a_username"]}'";
    if(mysqli_query($conn, $update_profile)){
        echo '<script>alert("Profile update successfully!");</script>';
    }else{
        echo '<script>alert("Error : '.mysqli_error($conn).'");</script>';
    }
}
?>

<?php
    include_once 'footer.php';
?>
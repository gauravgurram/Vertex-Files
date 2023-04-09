<?php
date_default_timezone_set('Asia/Kolkata');
include_once '../assets/db/db.php';
session_start();
if(!isset($_SESSION["a_username"])){
    header("Location: login");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $title; ?> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link href="../assets/css/common.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/logo/vps_logo.jpg">
</head>
<body class="bg-light">
    <div class="container-fluid bg-secondary py-2 shadow">
        <div class="row">
            <div class="col-md-2">
                <a href="#">
                    <img src="../assets/logo/vps_logo.png" alt="VPS Logo" width="100" height="45" draggable="false">
                </a>
            </div>
            <div class="col-md-8">
                <h3 class="brod-fnt text-white text-center pt-1">VEHICLE PARKING SYSTEM</h3>
            </div>
            <div class="col-md-2 d-flex montserrat-fnt">
                <div> <img src="https://w7.pngwing.com/pngs/527/663/png-transparent-logo-person-user-person-icon-rectangle-photography-computer-wallpaper.png" width="40" height="40" alt="" class="rounded-circle dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"> </div>
                <div class="dropdown">
                    <h6 class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
<?= $_SESSION['a_username']; ?>
                    </h6>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="my-profile">My Profile</a></li>
                        <li><a class="dropdown-item" href="change-password">Change Password</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="logout">Logout</a></li>
                    </ul>
            </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="addSlot" tabindex="-1" aria-labelledby="addSlotLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addSlotLabel">Add Parking Slot</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
            <div class="form-group">
                <label for="">Slot For</label>
                <select name="" id="category_optn" class="form-control form-select">
                    <option value="0">  -- Select Category --  </option>
                <?php
                    $select_category = "select * from category where status='0'";
                    $result = mysqli_query($conn, $select_category);
                    if(mysqli_num_rows($result)>0){
                        while($data = mysqli_fetch_array($result)){
                            echo '<option value="'.$data["category_id"].'"> '.$data["category_name"].' </option>';
                        }
                    }else{
                        echo '<option value="0"> Category Not Found! </option>';
                    }
                ?>
                </select>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <input type="submit" value="Add Slot" name="submit_btn" id="addslot_btn" class="btn btn-success">
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function(){

        $("#addslot_btn").click(function(){
            var cat_id = $("#category_optn").val();

            $.ajax({
                url: 'operations.php',
                type: 'post',
                data: {
                    action: 'add-slot',
                    catid: cat_id
                },
                success: function(response){
                    if(response=='1'){
                        alert("Slot Added Successfully!");
                        $("#addSlot").modal("hide");
                    }else{
                        alert("Error Occured!");
                    }
                }
            });
        });

    });
</script>
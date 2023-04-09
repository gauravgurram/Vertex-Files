<?php
    $title = "View Users";
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
    <div class="row shadow rounded my-5 py-4 bg-white">
        <div class="col-md-12">
            <?php
                $count=1;
                $select_user = "select * from user where status='1'";
                $result = mysqli_query($conn, $select_user);
                if(mysqli_num_rows($result)>0){
                    ?>
                    <table class="table table-bordered">
                        <tr>
                            <th>Sr.No.</th>
                            <th>Name</th>
                            <th>Email Id</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Username</th>
                            <th>Id Proof Doc</th>
                            <th>Id Proof</th>
                            <th>Action</th>
                        </tr>
                    <?php
                    while($data = mysqli_fetch_array($result)){
                        ?>
                            <tr>
                                <td> <?= $count++; ?> </td>
                                <td> <?= $data['name'] ?> </td>
                                <td> <?= $data['email_id'] ?> </td>
                                <td> <?= $data['mobile_no'] ?> </td>
                                <td> <?= $data['address'] ?> </td>
                                <td> <?= $data['username'] ?> </td>
                                <td> <?= $data['idproof_type'] ?> </td>
                                <td> <?= $data['id_proof'] ?> </td>
                                <td>
                                    <button type="button" class="fas fa-edit text-warning edit_btn" data-id="<?= $data['user_id'] ?>" data-name="<?= $data['name'] ?>" data-bs-toggle="modal" data-bs-target="#editUser" title="Edit">Edit</button>&emsp;
                                    <button type="button" class="fas fa-trash-alt text-danger delete_btn" data-id="<?= $data['user_id'] ?>" title="Delete">Delete</button>
                                </td>
                            </tr>
                        <?php
                    }
                }else{
                    echo '<div class="alert alert-danger"><strong>User Not Found!</strong></div>';
                }
            ?>
            </table>
        </div>
    </div>
</form>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editUserLabel">Edit User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <input type="hidden" name="" id="userid_hdnfld">
        </div>
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name_txt" id="name_txt" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success" id="update_btn">Update User</button>
      </div>
    </div>
  </div>
</div>

<?php
    include_once 'footer.php';
?>

<script>
    $(document).ready(function(){
        $(document).on("click",".edit_btn",function(){
            $("#userid_hdnfld").val($(this).data("id"));
            $("#name_txt").val($(this).data("name"));
        });

        $(document).on("click",".delete_btn",function(){
            var id = $(this).data("id");
            if(confirm("Do you really want to delete this user?")){
                $.ajax({
                url: 'operations.php',
                type: 'post',
                data: {
                    action: 'delete-user',
                    usrid: id,
                },
                // beforeSend: function(){
                //     $("#update_btn").html("Wait...").attr("disabled",true);
                // },
                success: function(response){
                    if(response=='1'){
                        alert("User Delete Successfully!");
                    }else{
                        alert("Error Occured!");
                    }
                }
            });
            }
        });
        

        $("#update_btn").click(function(){
            var usr_id = $("#userid_hdnfld").val();
            var usr_name = $("#name_txt").val();
            $.ajax({
                url: 'operations.php',
                type: 'post',
                data: {
                    action: 'update-user',
                    usrid: usr_id,
                    usrname: usr_name
                },
                // beforeSend: function(){
                //     $("#update_btn").html("Wait...").attr("disabled",true);
                // },
                success: function(response){
                    if(response=='1'){
                        alert("User Update Successfully!");
                        $('#editUser').modal('hide');
                    }else{
                        alert("Error Occured!");
                    }
                }
            });
        });

    });
</script>
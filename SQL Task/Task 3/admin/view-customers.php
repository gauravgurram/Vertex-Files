<?php
    $title = "View Customer";
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
                $select_customer = "select * from customer";
                $result = mysqli_query($conn, $select_customer);
                if(mysqli_num_rows($result)>0){
                    ?>
                    <table class="table table-bordered">
                        <tr>
                            <th>Sr.No.</th>
                            <th>Name</th>
                            <th>Email Id</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    <?php
                    while($data = mysqli_fetch_array($result)){
                        ?>
                            <tr>
                                <td> <?= $count++; ?> </td>
                                <td> <?= $data['name'] ?> </td>
                                <td> <?= $data['email'] ?> </td>
                                <td> <?= $data['mobile'] ?> </td>
                                <td> <?= $data['address'] ?> </td>
                                <td>
                                    <button type="button" class="fas fa-edit text-warning edit_btn" data-id="<?= $data['customer_id'] ?>" data-name="<?= $data['name'] ?>" data-bs-toggle="modal" data-bs-target="#editCustomer" title="Edit">Edit</button>&emsp;
                                    <button type="button" class="fas fa-trash-alt text-danger delete_btn" data-id="<?= $data['customer_id'] ?>" title="Delete">Delete</button>
                                </td>
                            </tr>
                        <?php
                    }
                }else{
                    echo '<div class="alert alert-danger"><strong>Customer Not Found!</strong></div>';
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
<div class="modal fade" id="editCustome" tabindex="-1" aria-labelledby="editCustomerLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editCustomerLabel">Edit Customer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <input type="hidden" name="" id="customerid_hdnfld">
        </div>
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name_txt" id="name_txt" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success" id="update_btn">Update Customer</button>
      </div>
    </div>
  </div>
</div>

<?php
    include_once 'footer.php';
?>

<!-- <script>
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
</script> -->
<?php
    $title = "Manage Category";
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
        <div class="col-md-10 m-auto">
            <?php
                $count=1;
                $select_category = "select * from category where status='0'";
                $result = mysqli_query($conn, $select_category);
                if(mysqli_num_rows($result)>0){
                    ?>
                        <table class="table table-striped table-bordered">
                        <tr>
                            <th>Sr.No.</th>
                            <th>Category Id</th>
                            <th>Category Name</th>
                            <th>Charegs (Per Hour)</th>
                            <th>Date Time</th>
                            <th>Action</th>
                        </tr>
                    <?php
                    while($data = mysqli_fetch_array($result)){
                        ?>
                            <tr>
                                <td> <?= $count++; ?> </td>
                                <td> <?= $data['category_id'] ?> </td>
                                <td> <?= $data['category_name'] ?> </td>
                                <td> <?= $data['charges_per_hour'] ?> </td>
                                <td> <?= $data['create_date'] ?> </td>
                                <td>
                                    <button type="button" class="fas fa-edit text-warning edit_btn" data-id="<?= $data['category_id'] ?>" data-name="<?= $data['category_name'] ?>" data-charge="<?= $data['charges_per_hour'] ?>" data-bs-toggle="modal" data-bs-target="#editCategory" title="Edit">Edit</button>&emsp;
                                    <button type="button" class="fas fa-trash-alt text-danger delete_btn" data-id="<?= $data['category_id'] ?>" title="Delete">Delete</button>
                                </td>
                            </tr>
                        <?php
                    }
                }else{
                    echo '<div class="alert alert-danger"><strong>Category Not Found!</strong></div>';
                }
            ?>
            </table>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="editCategory" tabindex="-1" aria-labelledby="editCategoryLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editCategoryLabel">Edit Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <input type="hidden" name="" id="catid_hdnfld">
        </div>
        <div class="form-group">
            <label for="">Category Name</label>
            <input type="text" name="categoryname_txt" id="categoryname_txt" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Chareges (Per Hour)</label>
            <input type="text" name="chrge-per-hr_txt" id="chrge-per-hr_txt" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success" id="update_btn">Update Category</button>
      </div>
    </div>
  </div>
</div>

</form>

        </div>
    </div>
</div>


<?php
    include_once 'footer.php';
?>

<script>
    $(document).ready(function(){
        $(document).on("click",".edit_btn",function(){
            $("#catid_hdnfld").val($(this).data("id"));
            $("#categoryname_txt").val($(this).data("name"));
            $("#chrge-per-hr_txt").val($(this).data("charge"));
        });

        $(document).on("click",".delete_btn",function(){
            var id = $(this).data("id");
            if(confirm("Do you really want to delete this category?")){
                $.ajax({
                url: 'operations.php',
                type: 'post',
                data: {
                    action: 'delete-category',
                    catid: id,
                },
                // beforeSend: function(){
                //     $("#update_btn").html("Wait...").attr("disabled",true);
                // },
                success: function(response){
                    if(response=='1'){
                        alert("Category Delete Successfully!");
                    }else{
                        alert("Error Occured!");
                    }
                }
            });
            }
        });
        

        $("#update_btn").click(function(){
            var cat_id = $("#catid_hdnfld").val();
            var cat_name = $("#categoryname_txt").val();
            var chrg = $("#chrge-per-hr_txt").val();
            $.ajax({
                url: 'operations.php',
                type: 'post',
                data: {
                    action: 'update-category',
                    catid: cat_id,
                    catname: cat_name,
                    charge: chrg
                },
                // beforeSend: function(){
                //     $("#update_btn").html("Wait...").attr("disabled",true);
                // },
                success: function(response){
                    if(response=='1'){
                        alert("Category Update Successfully!");
                        $('#editCategory').modal('hide');
                    }else{
                        alert("Error Occured!");
                    }
                }
            });
        });

    });
</script>
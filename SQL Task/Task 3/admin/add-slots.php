<?php
    $title = "Add Slots";
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
                            <label for="">Slot For</label>
                            <select name="" id="" class="form-control form-select">
                                <option value="0">  -- Select Category --  </option>
                            <?php
                                $select_category = "select * from category where status='0'";
                                $result = mysqli_query($conn, $select_category);
                                if(mysqli_num_rows($result)>0){
                                    while($data = mysqli_fetch_array($result)){
                                        echo '<option value="'.$data["category_id"].'"> '.$data["category_name"].' </option>';
                                    }
                                }else{
                                    //echo '<div class="alert alert-danger"><strong>Category Not Found!</strong></div>';
                                }
                            ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Add Category" name="submit_btn" class="btn btn-success">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php

    if(isset($_POST['submit_btn'])){
        $category_id = "CAT".date("his");
        $category_name = $_POST["catname_txt"];
        $insert_cat = "insert into category (category_id, category_name, status) values ('$category_id','$category_name','0')";

        if(mysqli_query($conn, $insert_cat)){
            echo "<script>alert('Category added successfully!')</script>";
        }else{
            echo "<script>alert('Error : ".mysqli_error($conn)."')</script>";
        }
    }
?>

<?php
    include_once 'footer.php';
?>
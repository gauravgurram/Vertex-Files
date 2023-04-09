<?php
    $title = "Add Category";
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
                            <label for="">Category Name</label>
                            <input type="text" name="catname_txt" id="catname_txt" placeholder="Category Name" class="form-control" autofocus>
                            <h6 id="catnameerror_txt"></h6>
                        </div>
                        <div class="form-group">
                            <label for="">Charges (Per Hour)</label>
                            <input type="text" name="chrge-per-hr_txt" id="chrge-per-hr_txt" class="form-control" placeholder="Chareges (Per Hour)">
                            <h6 id="chargeserror_txt"></h6>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Add Category" name="submit_btn" id="submit_btn" class="btn btn-success">
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
        $chrge_per_hr = $_POST["chrge-per-hr_txt"];
        $insert_cat = "insert into category (category_id, category_name, charges_per_hour, status) values ('$category_id','$category_name','$chrge_per_hr','0')";

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

<script>
    $(document).ready(function(){
        var category_err = true;
        var charges_err = true;

        $("#catname_txt").keyup(function(){
            category_check();
        });
        function category_check(){
            var catname_val = $("#catname_txt").val();
            if(catname_val.length==""){
                $("#catnameerror_txt").html("Category Name Required!");
                $("#catnameerror_txt").css("color","red").css("display","block");
                category_err = false;
                return false;
            }else{
                $("#catnameerror_txt").hide();
            }
        }

        $("#chrge-per-hr_txt").keyup(function(){
            this.value = this.value.replace(/[^0-9\.]/g,'');
            charges_check();
        });
        function charges_check(){
            var charges_val = $("#chrge-per-hr_txt").val();
            if(charges_val.length==""){
            $("#chargeserror_txt").html("Charges Field Required");
            $("#chargeserror_txt").css("color","red").css("display","block");
            }else{
                $("#chargeserror_txt").hide();
            }
        }

        $("#submit_btn").click(function(){
            var category_err = true;
            var charges_err = true;

            category_check();
            charges_check();

            if((category_err==true) && (charges_err==true)){
                return true;
            }else{
                return false;
            }
        });
        
    });
</script>
<?php
    $title = "Add Vehicle";
    include_once 'header.php';
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 px-0">

<?php include_once 'sidebar.php'; ?>
        </div>
        <div class="col-md-10 p-4">

<?php include_once 'breadcrump.php'; ?>
    <!-- code here -->
    <form action="" method="post">
        <div class="container-fluid shadow rounded my-4 mx-1 py-4 bg-white">
            <div class="row">
                <div class="col-12 col-md-6">
                    <!-- <button type="button" class="btn btn-success float-none">New Customer</button> -->

                    <div class="py-2">
                        <input type="radio" name="customer_rdo" id="newcust_rdo" value="new_customer" checked>&nbsp;<label for="newcust_rdo">New Customer</label>&emsp;
                        <input type="radio" name="customer_rdo" id="existcust_rdo" value="exist_customer">&nbsp;<label for="existcust_rdo">Existing Customer</label>

                        <!-- <div class="form-check form-switch">
                            <input class="form-check-input" type="radio" name="customer_rdo" id="newcust_rdo" value="new customer" checked>
                            <label class="form-check-label" for="newcust_rdo">New Customer</label>
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="radio" name="customer_rdo" id="existcust_rdo" value="exist customer">
                            <label class="form-check-label" for="existcust_rdo">Existing Customer</label>
                        </div> -->

                    </div>

                    <div class="border rounded p-3 mb-2" id="searchcust_div">
                        <input type="search" name="searchcust_txt" id="searchcust_txt" class="form-control" placeholder="Search Customer">
                        <ul class="list-group mt-1" id="customerlist_ul">
                        </ul>
                    </div>

                    <div class="border rounded p-3" id="newcust_div">
                    <h5>Customer Details</h5>
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name_txt" id="name_txt" class="form-control" placeholder="Name" autofocus>
                            <h6 id="nameerror_txt"></h6>
                        </div>

                        <div class="form-group">
                            <label for="">Email Id</label>
                            <input type="email" name="email_txt" id="email_txt" class="form-control" placeholder="Email">
                            <h6 id="emailerror_txt"></h6>
                        </div>

                        <div class="form-group">
                            <label for="">Mobile</label>
                            <input type="tel" name="mobile_txt" id="mobile_txt" class="form-control" placeholder="Mobile" maxlength="10">
                            <h6 id="mobileerror_txt"></h6>
                        </div>

                        <div class="form-group">
                            <label for="">Address</label>
                            <textarea name="address_txt" id="address_txt" cols="30" rows="3" class="form-control" placeholder="Address"></textarea>
                            <h6 id="addresserror_txt"></h6>
                        </div>
                    </div>

                    <div class="border rounded p-3 my-3" id="slotscontain_div">
                        <div class="row text-center mb-3">
                            <div class="col-4">
                                <i class="fas fa-square text-secondary"></i><br><label for="">Available</label>
                            </div>
                            <div class="col-4">
                                <i class="fas fa-square text-danger"></i><br><label for="">Occupied</label>
                            </div>
                            <div class="col-4">
                                <i class="fas fa-square text-success"></i><br><label for="">Selected</label>
                            </div>
                        </div>
                        <div class="row">
                            <style>#slots_div li{ padding:20px;  }</style>
                            <ul id="slots_div">

                            </ul>
                        </div>
                        <div class="form-group text-end">
                            <input type="hidden" name="slotid_hdnfld" id="slotid_hdnfld">
                            <input type="hidden" name="customerid_hdnfld" id="customerid_hdnfld">
                            <input type="submit" id="submit_btn" name="submit_btn" value="Submit" class="btn btn-success">
                        </div>
                    </div>

                </div>
                <!-- end -->
                <div class="col-12 col-md-6">
                    <!-- <button type="button" class="btn btn-success">Existing Customer</button> -->
                    <div class="border rounded p-3">
                    <h5>Vehicle Details</h5>

                        <div class="form-group">
                            <?php
                                $select_category = "select * from category order by category_name desc";
                                $result = mysqli_query($conn, $select_category);
                                if(mysqli_num_rows($result)>0){
                                    while($data = mysqli_fetch_array($result)){
                                        ?>
                                            <input type="radio" name="category_rdo" data-id="<?= $data['category_id'] ?>" data-charge="<?= $data['charges_per_hour'] ?>" id="<?= $data['category_id'] ?>" value="<?= $data['category_name'] ?>">&nbsp;
                                            <label for="<?= $data['category_id'] ?>"><?= $data['category_name'] ?></label>&emsp;
                                        <?php
                                    }
                                }
                            ?>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="charge_hdnfld" id="charge_hdnfld">
                        </div>

                        <div class="form-group">
                            <label for="">Manufacturer Company Name</label>
                            <input type="text" name="companyname_txt" id="companyname_txt" class="form-control" placeholder="Manufacturer Company Name">
                        </div>

                        <div class="form-group">
                            <label for="">Modal</label>
                            <input type="text" name="model_txt" id="model_txt" class="form-control" placeholder="Modal">
                        </div>

                        <div class="form-group">
                            <label for="">Color</label>
                            <input type="text" name="color_txt" id="color_txt" class="form-control" placeholder="Color">
                        </div>

                        <div class="form-group">
                            <label for="">Registration Number</label>
                            <input type="text" name="registrationno_txt" id="registrationno_txt" class="form-control" placeholder="Registration Number">
                        </div>

                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description_txt" id="description_txt" cols="30" rows="3" class="form-control" placeholder="Description"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Remark</label>
                            <textarea name="remark_txt" id="remark_txt" cols="30" rows="3" class="form-control" placeholder="Remark"></textarea>
                        </div>

                        <!-- <div class="form-group text-end">
                            <input type="submit" value="Add Vehicle" class="btn btn-success">
                            <button class="btn btn-success" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Choose Slot</button>
                        </div> -->

                    </div>
                </div>

                </div>
            </div> <!-- container-fluid end-->

            </form>
            </div>
        </div>
    </div>
</div>

<?php
    if(isset($_POST["submit_btn"])){
        //for customer table
        $customer_id = "CUST".date("ymdhis");
        $name = $_POST["name_txt"];
        $email = $_POST["email_txt"];
        $mobile = $_POST["mobile_txt"];
        $address = $_POST["address_txt"];

        //for vehicle table
        $vehicle_id = "VH".time();
        $vehicle_type = $_POST["category_rdo"];
        $company = $_POST["companyname_txt"];
        $model = $_POST["model_txt"];
        $color = $_POST["color_txt"];
        $rno = $_POST["registrationno_txt"];
        $desc = $_POST["description_txt"];
        $remark = $_POST["remark_txt"];
        $charge = $_POST['charge_hdnfld'];

        //for slot table
        $slot_id = $_POST["slotid_hdnfld"];
        $exist_customer_id = $_POST["customerid_hdnfld"];

        //added by
        $addby = $_SESSION["u_username"];

        $cust_status = $_POST["customer_rdo"];

        switch($cust_status){
            case "new_customer":
                $insert_customer = "insert into customer (customer_id, name, mobile, email, address, status) values ('$customer_id','$name','$mobile','$email','$address','1')";
                $insert_vehicle = "insert into vehicle (vehicle_id, customer_id, vehicle_type, charges_per_hour, company_name, modal, color, registration_no, description, remark, status, added_by, slot_id) values ('$vehicle_id', '$customer_id', '$vehicle_type', '$charge','$company','$model','$color','$rno','$desc','$remark','In','$addby','$slot_id')";
                $update_slot = "update slot set customer_id='$customer_id', status='1' where slot_id='$slot_id'";
                if(mysqli_query($conn, $insert_customer)){
                    echo '<script>alert("Customer Added Successfully!");</script>';
                    if(mysqli_query($conn, $insert_vehicle)){
                        echo '<script>alert("Vehicle Added Successfully!");</script>';
                        if(mysqli_query($conn, $update_slot)){
                            echo '<script>alert("Slot Updated Successfully!");</script>';
                        }else{ //slot error
                            echo '<script>alert("Slot Error Occured : "'.mysqli_error($conn).'");</script>';
                        }
                    }else{//vehicle error
                        echo '<script>alert("Vehicle Error Occured : "'.mysqli_error($conn).'");</script>';
                    }
                }else{//customer error
                    echo '<script>alert("Customer Error Occured : "'.mysqli_error($conn).'");</script>';
                }
                break;
            case "exist_customer":
                $insert_vehicle = "insert into vehicle (vehicle_id, customer_id, vehicle_type, charges_per_hour, company_name, modal, color, registration_no, description, remark, status, added_by, slot_id) values ('$vehicle_id', '$exist_customer_id', '$vehicle_type', '$charge','$company','$model','$color','$rno','$desc','$remark','In','$addby','$slot_id')";
                $update_slot = "update slot set customer_id='$exist_customer_id', status='1' where slot_id='$slot_id'";
                    if(mysqli_query($conn, $insert_vehicle)){
                        echo '<script>alert("Vehicle Added Successfully!");</script>';
                        if(mysqli_query($conn, $update_slot)){
                            echo '<script>alert("Slot Updated Successfully!");</script>';
                        }else{ //slot error
                            echo '<script>alert("Slot Error Occured : "'.mysqli_error($conn).'");</script>';
                        }
                    }else{//vehicle error
                        echo '<script>alert("Vehicle Error Occured : "'.mysqli_error($conn).'");</script>';
                    }
                break;
            default:
                echo "";
        }
    }
?>

<?php
    include_once 'footer.php';
?>

<script>
    $(document).ready(function(){
        //convert registration no uppercase
        $("#registrationno_txt").keyup(function(){
            $(this).val($(this).val().toUpperCase());
        });

        //choose customers new or existing
        $("#searchcust_div").hide();

        $("input[type='radio']").click(function(){
        	var radioValue = $("input[name='customer_rdo']:checked").val();
            if(radioValue == 'new_customer'){
                //alert(radioValue);
                $("#searchcust_div").hide();
                $("#newcust_div").show();
                $("#name_txt").focus();
            }
            if(radioValue == 'exist_customer'){
                //alert(radioValue);
                $("#searchcust_div").show();
                $("#newcust_div").hide();
                $("#searchcust_txt").focus();
            }
        });

        //search customers
        $("#searchcust_txt").keyup(function(){
            var search_val = $(this).val();

            $.ajax({
                url: 'operations.php',
                type: 'post',
                data: {
                    action: 'search-customer',
                    c_name: search_val
                },
                beforeSend:function(){
                    $("#customerlist_ul").html('<li class="list-group-item text-warning fw-bold">Customer Scanning...</li>');
                },
                success: function(response){
                    $("#customerlist_ul").html(response);
                }
            });
        });

        //get existing customer li into searchbox
        $(document).on("mouseover",".list-group-item",function(){
            //alert("success");
            $("#searchcust_txt").val($(this).html());
        });
        $(document).on("click",".list-group-item",function(){
            //alert("success");
            $("#searchcust_txt").val($(this).html());
            $(".list-group-item").hide();
            $("#customerid_hdnfld").val($(this).data("id"));
        });

        //slots container div hide
        $("#slotscontain_div").hide();
        //get all slots
        $("input[type='radio'][name='category_rdo']").click(function(){
            var catid = $(this).data("id");
            $("#charge_hdnfld").val($(this).data("charge"));
            $.ajax({
                url: 'operations.php',
                type: 'post',
                data: {
                    action: 'get-slot',
                    cat_id: catid
                },
                success: function(response){
                    $("#slots_div").html(response);
                    $("#slotscontain_div").show();
                    $("#companyname_txt").focus();
                }
            });
        });

        //get slot id
        $(document).on("click", ".select-slot", function(){
            $("#slotid_hdnfld").val($(this).data("id"));
        });

        //get slot id
        $(document).on("mouseover", "ul .occu_slot", function(){
            var slotid = $(this).data("id");
            $.ajax({
                url: 'operations.php',
                type: 'post',
                data: {
                    action: 'get-custslot',
                    slot_id: slotid
                },
                success: function(response){
                    console.log(response);
                    //.html(response);
                }
            });
        });


        // $(document).on("mouseover", "ul .select-slot", function(){
        //     $(this).addClass("text-success").siblings().removeClass("text-success");
        // });

        $(document).on("click", "ul .select-slot", function(){
            $(this).addClass("text-success").siblings().removeClass("text-success");
        });

    });
</script>

<script>
    $(document).ready(function(){
        var name_err = true;
        var email_err = true;
        var mobile_err = true;
        var address_err = true;

        var category_err = true;
        var company_err = true;
        var modal_err = true;
        var color_err = true;
        var reg_err = true;

        var slot_err = true;

        //for name
        $("#name_txt").keyup(function(){
            name_check();
        });
        function name_check(){
            var name_val = $('#name_txt').val();

            //check blank input
            if(name_val.length==""){
                $('#nameerror_txt').html("Name Required!");
                $('#nameerror_txt').css("color","red").css("display","block");
                name_err = false;
                return false;
            }
            //check length less than 3
            else if(name_val.length<3){
                $('#nameerror_txt').html("Name should be 3 letters!");
                $('#nameerror_txt').css("color","red").css("display","block");
                name_err = false;
                return false;
            }
            //check length grater than 20
            else if(name_val.length>20){
                $('#nameerror_txt').html("Name should be less than 20 letters!");
                $('#nameerror_txt').css("color","red").css("display","block");
                name_err = false;
                return false;
            }
            else{
                $('#nameerror_txt').hide();
            }
        }

        //for email
        $("#email_txt").keyup(function(){
            email_check();
        });
        function email_check(){
            var email_val = $("#email_txt").val();
            var emlexpr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

            if(email_val.length==0){
                $('#emailerror_txt').html("Email Required!");
                $('#emailerror_txt').css("color","red").css("display","block");
                email_err = false;
                return false;
            }
            else if(!email_val.match(emlexpr)){
                $('#emailerror_txt').html("Invalid Email!");
                $('#emailerror_txt').css("color","red").css("display","block");
                email_err = false;
                return false;
            }
            else{
                $('#emailerror_txt').hide();
            }
        }

        //for mobile
        $("#mobile_txt").keyup(function(){
            this.value = this.value.replace(/[^0-9\.]/g,'');
            mobile_check();
        });
        function mobile_check(){
            var mobile_val = $('#mobile_txt').val();
            var mblexpr=/^[789][0-9]{9}$/;

            if (mobile_val.length=="") {
                $('#mobileerror_txt').html("Mobile Number Required.");
                $('#mobileerror_txt').css("color","red").css("display","block");
                mobile_err = false;
                return false;
            }

            else if(!mobile_val.match(mblexpr)){
                $('#mobileerror_txt').html("Invalid Mobile Number");
                $('#mobileerror_txt').css("color","red").css("display","block");
                mobile_err = false;
                return false;
            }else{
                $('#mobileerror_txt').hide();
            }
        }

        //for address
        $("#address_txt").keyup(function(){
            address_check();
        });

        function address_check(){
            var address_val = $("#address_txt").val();

            if (address_val.length=="") {
                $('#addresserror_txt').html("Address Required.");
                $('#addresserror_txt').css("color","red").css("display","block");
                address_err = false;
                return false;
            }else{
            $('#addresserror_txt').hide();
            }
        }

    });
</script>
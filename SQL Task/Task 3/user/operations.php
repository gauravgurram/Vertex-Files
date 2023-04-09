<?php
    include_once '../assets/db/db.php';

    $action = $_POST['action'];
    //search live customers
    if($action=="search-customer"){
        $customer_name = $_POST['c_name'];
        if(!empty($customer_name)){
            $select_customer = "select customer_id, name from customer where name like '%".$customer_name."%'";
            $result = mysqli_query($conn, $select_customer);
            if(mysqli_num_rows($result)>0){
                while($customer = mysqli_fetch_array($result)){
                    ?>
                    <li class="list-group-item list-group-item-action" data-id="<?= $customer[0]; ?>"><?= $customer[1]; ?></li>
                    <?php
                }
            }else{
                echo '<li class="list-group-item text-danger fw-bold">Customer Not Found!</li>';
            }
        }
    }

    //get all slots
    if($action=="get-slot"){
        $catid = $_POST["cat_id"];

        $select_slot = "select slot_id, status, customer_id from slot where category_id='{$catid}'";
        $result = mysqli_query($conn, $select_slot);
        if(mysqli_num_rows($result)>0){
            while($slots = mysqli_fetch_array($result)){
                ?> 
                    <?php
                    if($slots[1]=='1'){
                        ?>
                            <li class="fas fa-parking fa-2x text-danger my-2 mx-4 occu_slot" data-id="<?= $slots['slot_id'] ?>" ></li> <!---title="<?= $slots['customer_id'] ?>"-->
                        <?php
                    }else{
                        ?>
                            <li class="fas fa-parking fa-2x text-secondary select-slot my-2 mx-4" data-id="<?= $slots['slot_id'] ?>" title="<?= $slots['slot_id'] ?>"></li>
                        <?php
                    }
                    ?>
                <?php
            }
        }
    }

    if($action=="get-custslot"){
        $slotid = $_POST["slot_id"];
        $select_occupid_slot = "select * from vehicle where slot_id='$slotid'";
        $result = mysqli_query($conn, $select_occupid_slot);
        $row = mysqli_fetch_array($result);

        ?>
            <div class="card">
                <div class="card-body">
                    <?= $row[1] ?>
                </div>
            </div>
        <?php
    }

    if($action=="search-vehicle"){
        $count = 1;
        $search_val = $_POST["search"];
        $select_vehicle = "select * from vehicle where registration_no='{$search_val}'";
        $result = mysqli_query($conn, $select_vehicle);
        if(mysqli_num_rows($result)>0){
            ?>
            <table class="table table-striped table-bordered">
                <tr>
                    <th>Sr. No.</th>
                    <th>Vehicle Type</th>
                    <th>Company</th>
                    <th>Modal</th>
                    <th>Color</th>
                    <th>Registration No.</th>
                    <th>Description</th>
                    <th>Remark</th>
                    <th>Status</th>
                    <th>In Time</th>
                    <th>Out Time</th>
                </tr>
            <?php
            while($data = mysqli_fetch_array($result)){
                ?>
                    <tr>
                        <td> <?= $count++; ?> </td>
                        <td> <?= $data['vehicle_type'] ?> </td>
                        <td> <?= $data['company_name'] ?> </td>
                        <td> <?= $data['modal'] ?> </td>
                        <td> <?= $data['color'] ?> </td>
                        <td> <?= $data['registration_no'] ?> </td>
                        <td> <?= $data['description'] ?> </td>
                        <td> <?= $data['remark'] ?> </td>
                        <td> <?= $data['status'] ?> </td>
                        <td> <?= $data['in_time'] ?> </td>
                        <td> <?= $data['out_time'] ?> </td>
                    </tr>
                <?php
            }
        }else{
            echo '<div class="alert alert-danger"><strong>Vehicle Not Found!</strong></div>';
        }
    }

    if($action=="vehicle-out"){
        $outtime = $_POST['outtime'];
        $vehicleid = $_POST['vid'];
        $slotid = $_POST['sid'];
        $invoicedt = $_POST['idt'];
        $invoiceid = $_POST['iid'];
        $customerid = $_POST['cid'];
        $amount = $_POST['amt'];

        $update_vehicle = "update vehicle set out_time='$outtime', status='Out' where vehicle_id='$vehicleid'";
        $update_slot = "update slot set customer_id='', status='0' where slot_id='$slotid'";

        $insert_invoice = "insert into invoice values ('$invoiceid','$customerid','$vehicleid','$invoicedt','$amount')";

        if(mysqli_query($conn, $update_vehicle)){
            echo '<script>alert("Vehicle Updated Successfully!");</script>';
            if(mysqli_query($conn, $update_slot)){
                echo '<script>alert("Slot Updated Successfully!");</script>';
                if(mysqli_query($conn, $insert_invoice)){
                    echo '<script>alert("Invoice Successfully!");</script>';
                }else{
                    echo '<script>alert("Invoice Error Occured : "'.mysqli_error($conn).'");</script>';
                }
            }else{
                echo '<script>alert("Slot Error Occured : "'.mysqli_error($conn).'");</script>';
            }
        }else{
            echo '<script>alert("Vehicle Error Occured : "'.mysqli_error($conn).'");</script>';
        }
    }

    if($action=="get-record-twodt"){
        $count = 1;
        $from_date = date('Y-m-d',strtotime($_POST["fromdate"]));
        $to_date = date('Y-m-d',strtotime($_POST["todate"]));
        $select_vehicle = "select * from vehicle where in_time between '" . $from_date . "' and  '" . $to_date . "'order by vehicle_id desc";
        $result = mysqli_query($conn, $select_vehicle);
        if(mysqli_num_rows($result)>0){
            ?>
            <table class="table table-striped table-bordered">
                <tr>
                    <th>Sr. No.</th>
                    <th>Vehicle Type</th>
                    <th>Company</th>
                    <th>Modal</th>
                    <th>Color</th>
                    <th>Registration No.</th>
                    <th>Description</th>
                    <th>Remark</th>
                    <th>Status</th>
                    <th>In Time</th>
                    <th>Out Time</th>
                </tr>
            <?php
            while($data = mysqli_fetch_array($result)){
                ?>
                    <tr>
                        <td> <?= $count++; ?> </td>
                        <td> <?= $data['vehicle_type'] ?> </td>
                        <td> <?= $data['company_name'] ?> </td>
                        <td> <?= $data['modal'] ?> </td>
                        <td> <?= $data['color'] ?> </td>
                        <td> <?= $data['registration_no'] ?> </td>
                        <td> <?= $data['description'] ?> </td>
                        <td> <?= $data['remark'] ?> </td>
                        <td> <?= $data['status'] ?> </td>
                        <td> <?= $data['in_time'] ?> </td>
                        <td> <?= $data['out_time'] ?> </td>
                    </tr>
                <?php
            }
        }else{
            echo '<div class="alert alert-danger"><strong>Record Not Found!</strong></div>';
        }
    }

    if($action=="get-record-vhc"){
        $count = 1;
        $vehicle_id = $_POST["vehicleid"];
        $select_vehicle = "select * from vehicle where vehicle_type='$vehicle_id'";
        $result = mysqli_query($conn, $select_vehicle);
        if(mysqli_num_rows($result)>0){
            ?>
            <table class="table table-striped table-bordered">
                <tr>
                    <th>Sr. No.</th>
                    <th>Vehicle Type</th>
                    <th>Company</th>
                    <th>Modal</th>
                    <th>Color</th>
                    <th>Registration No.</th>
                    <th>Description</th>
                    <th>Remark</th>
                    <th>Status</th>
                    <th>In Time</th>
                    <th>Out Time</th>
                </tr>
            <?php
            while($data = mysqli_fetch_array($result)){
                ?>
                    <tr>
                        <td> <?= $count++; ?> </td>
                        <td> <?= $data['vehicle_type'] ?> </td>
                        <td> <?= $data['company_name'] ?> </td>
                        <td> <?= $data['modal'] ?> </td>
                        <td> <?= $data['color'] ?> </td>
                        <td> <?= $data['registration_no'] ?> </td>
                        <td> <?= $data['description'] ?> </td>
                        <td> <?= $data['remark'] ?> </td>
                        <td> <?= $data['status'] ?> </td>
                        <td> <?= $data['in_time'] ?> </td>
                        <td> <?= $data['out_time'] ?> </td>
                    </tr>
                <?php
            }
        }else{
            echo '<div class="alert alert-danger"><strong>Record Not Found!</strong></div>';
        }
    }

    if($action=="get-status"){
        $count = 1;
        $vehicle_status = $_POST["vstatus"];
        $select_vehicle = "select * from vehicle where status='$vehicle_status'";
        $result = mysqli_query($conn, $select_vehicle);
        if(mysqli_num_rows($result)>0){
            ?>
            <table class="table table-striped table-bordered">
                <tr>
                    <th>Sr. No.</th>
                    <th>Vehicle Type</th>
                    <th>Company</th>
                    <th>Modal</th>
                    <th>Color</th>
                    <th>Registration No.</th>
                    <th>Description</th>
                    <th>Remark</th>
                    <th>Status</th>
                    <th>In Time</th>
                    <th>Out Time</th>
                </tr>
            <?php
            while($data = mysqli_fetch_array($result)){
                ?>
                    <tr>
                        <td> <?= $count++; ?> </td>
                        <td> <?= $data['vehicle_type'] ?> </td>
                        <td> <?= $data['company_name'] ?> </td>
                        <td> <?= $data['modal'] ?> </td>
                        <td> <?= $data['color'] ?> </td>
                        <td> <?= $data['registration_no'] ?> </td>
                        <td> <?= $data['description'] ?> </td>
                        <td> <?= $data['remark'] ?> </td>
                        <td> <?= $data['status'] ?> </td>
                        <td> <?= $data['in_time'] ?> </td>
                        <td> <?= $data['out_time'] ?> </td>
                    </tr>
                <?php
            }
        }else{
            echo '<div class="alert alert-danger"><strong>Record Not Found!</strong></div>';
        }
    }

    if($action=="get-rdo"){
        $monthval = $_POST["invalue"];
        $count = 1;
        if($monthval=='1'){
            //echo $monthval;
            //$select_vehicle = "select c.customer_id, name, v.vehicle_id, vehicle_type, company_name, modal, color, registration_no, description, remark, in_time, out_time, v.slot_id, charges_per_hour, v.status, i.invoice_datetime, invoice_id, amount from customer c inner join vehicle v on c.customer_id = v.customer_id inner join slot s on s.slot_id = v.slot_id inner join invoice i on i.customer_id = v.customer_id where month(invoice_datetime) = month(NOW())-1";
            $select_vehicle = "select * from invoice where month(invoice_datetime)=month(now())-1";
        }elseif($monthval=='3'){
            //echo $monthval;
            //$select_vehicle = "select c.customer_id, name, v.vehicle_id, vehicle_type, company_name, modal, color, registration_no, description, remark, in_time, out_time, v.slot_id, charges_per_hour, v.status, i.invoice_datetime, invoice_id, amount from customer c inner join vehicle v on c.customer_id = v.customer_id inner join slot s on s.slot_id = v.slot_id inner join invoice i on i.customer_id = v.customer_id where month(invoice_datetime) = month(NOW())-2";
            $select_vehicle = "select * from invoice where month(invoice_datetime)=month(now())-2";
        }
        $result = mysqli_query($conn, $select_vehicle);
        if(mysqli_num_rows($result)>0){
            ?>
            <table class="table table-striped table-bordered">
                <tr class="text-nowrap">
                    <th>Sr. No.</th>
                    <th>Vehicle Type</th>
                    <th>Company</th>
                    <th>Modal</th>
                    <th>Color</th>
                    <th>Registration No.</th>
                    <th>Description</th>
                    <th>Remark</th>
                    <th>Status</th>
                    <th>In Time</th>
                    <th>Out Time</th>
                    <th>Slot Id</th>
                    <th>Charges (Per Hour)</th>
                    <th>Invoice Id</th>
                    <th>Invoice DateTime</th>
                    <th>Amount</th>
                </tr>
            <?php
            while($data = mysqli_fetch_array($result)){
                ?>
                    <tr class="text-nowrap">
                        <td> <?= $count++; ?> </td>
                        <td> <?= $data['vehicle_type'] ?> </td>
                        <td> <?= $data['company_name'] ?> </td>
                        <td> <?= $data['modal'] ?> </td>
                        <td> <?= $data['color'] ?> </td>
                        <td> <?= $data['registration_no'] ?> </td>
                        <td> <?= $data['description'] ?> </td>
                        <td> <?= $data['remark'] ?> </td>
                        <td> <?= $data['status'] ?> </td>
                        <td> <?= $data['in_time'] ?> </td>
                        <td> <?= $data['out_time'] ?> </td>
                        <td> <?= $data['slot_id'] ?> </td>
                        <td> <?= $data['charges_per_hour'] ?> </td>
                        <td> <?= $data['invoice_id'] ?> </td>
                        <td> <?= $data['invoice_datetime'] ?> </td>
                        <td> <?= $data['amount'] ?> </td>

                    </tr>
                <?php
            }
        }else{
            echo '<div class="alert alert-danger"><strong>Record Not Found!</strong></div>';
        }
    }
?>
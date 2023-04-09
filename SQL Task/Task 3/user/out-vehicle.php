<?php
    $title = "Out Vehicle";
    include_once 'header.php';
?>

<div class="container-fluid first-div">
    <div class="row">
        <div class="col-md-2 px-0">
<?php
    include_once 'sidebar.php';
?>
        </div>
        <div class="col-md-10 p-4">

<?php include_once 'breadcrump.php'; ?>

            <form action="" method="post">
                <div class="row shadow rounded my-4 mx-1 py-4 bg-white overflow-auto">
                    <div class="col-md-12 content ">

                        <?php
        $count = 1;
        $select_out_vehicle = "select c.customer_id, c.name, v.vehicle_id, v.vehicle_type, v.company_name, v.modal, v.color, v.registration_no, v.description, v.remark, v.in_time, v.out_time, v.slot_id, v.charges_per_hour, v.status from customer c right join vehicle v on c.customer_id = v.customer_id where v.status='Out'";
        $result = mysqli_query($conn, $select_out_vehicle);
        if(mysqli_num_rows($result)>0){
            ?>
            <table class="table table-striped table-bordered">
                <tr class="text-nowrap">
                    <th>Sr. No.</th>
                    <th>Customer Name</th>
                    <th>Vehicle Type</th>
                    <th>Company</th>
                    <th>Modal</th>
                    <th>Color</th>
                    <th>Registration No.</th>
                    <th>Description</th>
                    <th>Remark</th>
                    <th>In Time</th>
                    <th>Out Time</th>
                    <th>Slot Id</th>
                    <th>Charges (Per Hour)</th>
                    <th>Status</th>
                    <!-- <th>Invoice Date</th>
                    <th>Invoice Id</th>
                    <th>Amount</th> -->
                    <!-- <th>Action</th> -->
                </tr>
            <?php
            while($data = mysqli_fetch_array($result)){
                ?>
                    <tr class="text-nowrap">
                        <td> <?= $count++; ?> </td>
                        <td> <?= $data[1] ?> </td>
                        <td> <?= $data[3] ?> </td>
                        <td> <?= $data[4] ?> </td>
                        <td> <?= $data[5] ?> </td>
                        <td> <?= $data[6] ?> </td>
                        <td> <?= $data[7] ?> </td>
                        <td> <?= $data[8] ?> </td>
                        <td> <?= $data[9] ?> </td>
                        <td> <?= $data[10] ?> </td>
                        <td> <?= $data[11] ?> </td>
                        <td> <?= $data[12] ?> </td>
                        <td> <?= $data[13] ?> </td>
                        <td> <?= $data[14] ?> </td>
                        <!-- <td> <?= $data[15] ?> </td>
                        <td> <?= $data[16] ?> </td>
                        <td> <?= $data[17] ?> </td> -->
                        <!-- <td>
                            <a href="generate-invoice?c_id=<?= $data['customer_id'] ?>&v_id=<?= $data['vehicle_id'] ?>&s_id=<?= $data['slot_id'] ?>" ><i class="fas fa-print"></i></a>
                        </td> -->
                    </tr>
                <?php
            }
        }else{
            echo '<div class="alert alert-danger"><strong>Vehicle Not Found!</strong></div>';
        }
?>
            </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    include_once 'footer.php';
?>
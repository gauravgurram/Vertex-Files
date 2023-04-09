<?php
    $title = "In Vehicle";
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
                <div class="row shadow rounded my-4 mx-1 py-4 bg-white">
                    <div class="col-md-12 m-auto content overflow-auto">

                        <?php
        $count = 1;
        $select_in_vehicle = "select distinct c.customer_id, c.name, v.vehicle_id, v.vehicle_type, v.company_name, v.modal, v.color, v.registration_no, v.description, v.remark, v.in_time, v.status, v.slot_id, v.charges_per_hour from customer c inner join vehicle v on c.customer_id = v.customer_id where v.status='In'";
        //$select_in_vehicle = "select * from vehicle where status='In'";
        $result = mysqli_query($conn, $select_in_vehicle);
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
                    <th>Status</th>
                    <th>Slot Id</th>
                    <th>Charges (Per Hour)</th>
                    <th>Action</th>
                </tr>
            <?php
            while($data = mysqli_fetch_array($result)){
                ?>
                    <tr class="text-nowrap">
                        <td> <?= $count++; ?> </td>
                        <td> <?= $data['name'] ?> </td>
                        <td> <?= $data['vehicle_type'] ?> </td>
                        <td> <?= $data['company_name'] ?> </td>
                        <td> <?= $data['modal'] ?> </td>
                        <td> <?= $data['color'] ?> </td>
                        <td> <?= $data['registration_no'] ?> </td>
                        <td> <?= $data['description'] ?> </td>
                        <td> <?= $data['remark'] ?> </td>
                        <td> <?= $data['in_time'] ?> </td>
                        <td> <?= $data['status'] ?> </td>
                        <td> <?= $data['slot_id'] ?> </td>
                        <td> <?= $data['charges_per_hour'] ?> </td>
                        <td>
                            <a href="generate-invoice?c_id=<?= $data['customer_id'] ?>&v_id=<?= $data['vehicle_id'] ?>&s_id=<?= $data['slot_id'] ?>" ><i class="fas fa-file-invoice"></i></a>
                        </td>
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
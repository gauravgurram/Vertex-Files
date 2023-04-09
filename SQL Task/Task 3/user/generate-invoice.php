<?php
    $title = "Generate Invoice";
    include_once 'header.php';

    if(isset($_GET['c_id']) & isset($_GET['v_id']) & isset($_GET['s_id'])){

    }else{
        header("Location: in-vehicle");
    }
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
                    <div class="col-md-12 m-auto content">

                        <?php
                            $select_query = "select c.customer_id, c.name, c.email, c.mobile, v.vehicle_id, v.vehicle_type, v.company_name, v.modal, v.color, v.registration_no, v.description, v.remark, v.in_time, v.status, v.slot_id, v.charges_per_hour, c.address from customer c inner join vehicle v on c.customer_id = v.customer_id where c.customer_id='{$_GET['c_id']}' and vehicle_id='{$_GET['v_id']}' and slot_id='{$_GET['s_id']}' and v.status='In'";
                            $result = mysqli_query($conn, $select_query);
                            $row = mysqli_fetch_array($result);
                        ?>

                        <div class="container border shadow p-4" id="invoice">
                            <div class="row">
                                <div class="col-12"><h3><strong>INVOICE</strong></h3></div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h6><span class="text-purple">Invoice Date</span><br><span id="invoicedt_h6"><?php echo date("Y-m-d"); ?></span></h6>
                                    <h6><span class="text-purple">Invoice #</span><br><span id="invoiceno_h6"><?php echo "INV".date("Ymdhis"); ?></span></h6>
                                    <h6><span class="text-purple">Customer #</span><br><span id="customer_h6"><?php echo $_GET['c_id']; ?></span></h6>
                                    <h5 class="text-purple">Mr/Miss <?= $row[1] ?></h5>
                                    <h6><?= $row[16] ?></h6>
                                    <h6><?= $row[2] ?></h6>
                                    <h6><?= $row[3] ?></h6>

                                </div>
                                <div class="col-6 text-end">
                                    <img src="../assets/logo/vps_logo.png" alt="VPS Logo" width="100" height="45" draggable="false" class="my-2">
                                    <h5>Vehicle Parking System</h5>
                                    <h6>Dnyanteerth Nagar, Kegaon, <br> Solapur-Pune National Highway, <br> Solapur- 413255, <br> Maharashtra (India)</h6>
                                    <h6>+91 8411899901</h6>
                                    <h6>sshimage@gmail.com</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <style>
                                        table tr td:nth-child(1) {
                                            width: 50%;
                                            text-align: right;
                                        }
                                        td h6{
                                            font-weight: 700;
                                        }
                                    </style>
                                    <table class="table table-sm">
                                        <tr>
                                            <td>Vehicle Id</td>
                                            <td><h6 id="vehicleid_h6"><?= $row[4] ?></h6></td>
                                        </tr>
                                        <tr>
                                            <td>Vehicle Type</td>
                                            <td><h6><?= $row[5] ?></h6></td>
                                        </tr>
                                        <tr>
                                            <td>Manufacture Name</td>
                                            <td><h6><?= $row[6] ?></h6></td>
                                        </tr>
                                        <tr>
                                            <td>Model</td>
                                            <td><h6><?= $row[7] ?></h6></td>
                                        </tr>
                                        <tr>
                                            <td>Color</td>
                                            <td><h6><?= $row[8] ?></h6></td>
                                        </tr>
                                        <tr>
                                            <td>Registration Number</td>
                                            <td><h6><?= $row[9] ?></h6></td>
                                        </tr>
                                        <tr>
                                            <td>Slot Id</td>
                                            <td><h6 id="slotid_h6"><?= $row[14] ?></h6></td>
                                        </tr>
                                        <tr>
                                            <td>In Time</td>
                                            <td><h6><?= $row[12] ?></h6></td>
                                        </tr>
                                        <tr>
                                            <td>Out Time</td>
                                            <td><h6 id="outtime_h6"><?= $out_time = date("Y-m-d H:i:s") ?></h6></td>
                                        </tr>
                                        <!-- <tr>
                                            <td>Total Hours</td>
                                            <td>
                                                <h6>
                                                    <?php
                                                        $date1 = new DateTime($row[12]);
                                                        $date2 = new DateTime($out_time);

                                                        $diff = $date2->diff($date1);

                                                        $hours = $diff->h;
                                                        $hours = $hours + ($diff->days*24);

                                                        echo $hours;
                                                    ?>
                                                </h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Charges (Per Hour)</td>
                                            <td><h6><?= $row[15] ?></h6></td>
                                        </tr> -->
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-9"></div>
                                <div class="col-md-3">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>Total Amount</th>
                                            <td>
                                                <?php
                                                if($hours>12){
                                                    $amount = $row[15] * $hours;
                                                    echo $amount;
                                                }else{
                                                    $amount = 15;
                                                    echo $amount;
                                                }

                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>GST</th>
                                            <td>18%</td>
                                        </tr>
                                        <?php
                                            $total              =   $amount;
                                            $gst                =   18;
                                            $calculateTax       =   100+$gst;
                                            $calculateAmount    =   $total*100;
                                            $actualPrice        =   $calculateAmount/$calculateTax;
                                            $gstAmount          =   round($total-$actualPrice,2);
                                        ?>
                                        <tr>
                                            <th>GST Amount</th>
                                            <td><?= $gstAmount; ?> </td>
                                        </tr>
                                        <tr>
                                            <th>Grand Total</th>
                                            <td>
                                                <h5 class="fw-bold text-purple" id="grand_h5"> <?= $amount + $gstAmount; ?> </h5>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="row my-4">
                                <div class="col-md-12 text-center">
                                    <h5 class="fw-bold">THANK YOU! AND DRIVE SAFELY</h5>
                                    <h6>Visit Again!</h6>
                                    <i class="float-start">*This is system generated invoice no signature required</i>
                                </div>
                            </div>

                        </div>

                        <div class="text-end">
                            <button onclick="printdiv('invoice');" type="button" id="print_btn" class="btn btn-info"> Print </button>
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

<script src="../assets/js/jspdf.debug.js"></script>
<script src="../assets/js/html2canvas.min.js"></script>
<script src="../assets/js/html2pdf.min.js"></script>

<script lang="javascript">
    function printdiv(printpage) {
        //var headstr = "<html><head><title><?= $_GET['c_id'] ?></title></head><body>";
        //document.getElementById('header').style.display = 'none';
        //document.getElementById('footer').style.display = 'none';
        var footstr = "</body>";
        var newstr = document.all.item(printpage).innerHTML;
        var oldstr = document.body.innerHTML;
        document.body.innerHTML = newstr + footstr;
        window.print();
        document.body.innerHTML = oldstr;
        return false;
    }

    $(document).ready(function(){
        $("#print_btn").click(function(){
            if(confirm("Are you sure want to out this vehicle?")){
                //alert("success");
                var outtime = $("#outtime_h6").html();
                var v_id = $("#vehicleid_h6").html();
                var s_id = $("#slotid_h6").html();
                var i_dt = $("#invoicedt_h6").html();
                var i_id = $("#invoiceno_h6").html();
                var c_id = $("#customer_h6").html();
                var amt = $("#grand_h5").html();
                //console.log(outtime+", vid-"+v_id+", sid-"+s_id+", iid-"+i_id+", idt-"+i_dt+", cid-"+c_id+", amt-"+amt);

                $.ajax({
                    url: 'operations.php',
                    type: 'post',
                    data: {
                        action: 'vehicle-out',
                        outtime: outtime,
                        vid: v_id,
                        sid: s_id,
                        idt: i_dt,
                        iid: i_id,
                        cid: c_id,
                        amt: amt
                    },
                    success: function(response){
                        alert(response);
                    }
                });
            }else{
                //alert("fail");
            }
        });
    });
</script>
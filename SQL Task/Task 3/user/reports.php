<?php
    $title = "Report";
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
                    <div class="col-md-12 d-flex">

                        <div class="form-group px-3">
                            <label for="">From Date</label>
                            <input type="date" name="" id="fromdate_dt" class="form-control" placeholder="From Date">
                        </div>
                        <div class="form-group px-3">
                            <label for="">To Date</label>
                            <input type="date" name="" id="todate_dt" class="form-control" placeholder="From Date">
                        </div>
                        <div class="form-group">
                            <label for="">Select Vehicle Type</label>
                            <select name="" id="select-vehicle_drpdwn" class="form-control form-select">
                                <option value="0"> -- Select Vehicle -- </option>
                            <?php
                                $select_category = "select * from category order by category_name desc";
                                $result = mysqli_query($conn, $select_category);
                                if(mysqli_num_rows($result)>0){
                                    while($data = mysqli_fetch_array($result)){
                                        ?>
                                            <option value="<?= $data['category_name'] ?>"><?= $data['category_name'] ?></option>
                                        <?php
                                    }
                                }
                            ?>
                            </select>
                        </div>
                        <div class="form-group px-3">
                            <label for="">Select Status</label>
                            <select name="" id="status_drpdwn" class="form-control form-select">
                                <option value="0"> -- Select Status -- </option>
                                <option value="in">In</option>
                                <option value="out">Out</option>
                            </select>
                        </div>
                        <div class="form-group px-3 pt-4">
                            <input type="radio" name="report_rdo" id="lastmonth_rdo" value="1">
                            <label for="lastmonth_rdo">Last Month</label>
                        </div>

                        <div class="form-group px-3 pt-4">
                            <input type="radio" name="report_rdo" id="last3month_rdo" value="3">
                            <label for="last3month_rdo">Last 3 Month</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div id="result_div" class="overflow-auto mt-3">

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
        $("#searchvehicle_txt").keyup(function(){
            var search_val = $(this).val();
            $.ajax({
                url: 'operations.php',
                type: 'post',
                data: {
                    action: 'search-vehicle',
                    search: search_val
                },
                success: function(response){
                    $("#result_div").html(response);
                }
            });
        });

        $("#todate_dt").change(function(){
            var frmdt = $("#fromdate_dt").val();
            var todt = $(this).val();
            //alert(frmdt+" "+todt);
            $.ajax({
                url: 'operations.php',
                type: 'post',
                data: {
                    action: 'get-record-twodt',
                    fromdate: frmdt,
                    todate: todt
                },
                success: function(response){
                    $("#result_div").html(response);
                }
            });
        });

        $("#select-vehicle_drpdwn").change(function(){
            var vclid = $(this).val();
            $.ajax({
                url: 'operations.php',
                type: 'post',
                data: {
                    action: 'get-record-vhc',
                    vehicleid: vclid
                },
                success: function(response){
                    $("#result_div").html(response);
                }
            });
        });


        $("#status_drpdwn").change(function(){
            var status = $(this).val();
            $.ajax({
                url: 'operations.php',
                type: 'post',
                data: {
                    action: 'get-status',
                    vstatus: status
                },
                success: function(response){
                    $("#result_div").html(response);
                }
            });
        })

        $("input[type='radio'][name='report_rdo']").change(function(){
            var input_val = $(this).val();
            $.ajax({
                url: 'operations.php',
                type: 'post',
                data: {
                    action: 'get-rdo',
                    invalue: input_val
                },
                success: function(response){
                    $("#result_div").html(response);
                }
            });
        });


    });//end of ready function
</script>
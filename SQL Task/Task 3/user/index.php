<?php
    $title = "Dashboard";
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
            <div class="row mb-4">
                <!-- <div class="col-md-3">
                    <div class="d-flex shadow p-3 rounded bg-success bg-gradient  text-white">
                        <div class="w-25">
                            <i class="fas fa-tags fa-3x"></i>
                        </div>
                        <div>
                            <h4>
                                <?php
                                    $q = mysqli_fetch_array(mysqli_query($conn,"select count(*) from category where status='0'"));
                                    echo $q[0];
                                ?>
                            </h4>
                            <h6>Total Categories </h6>
                        </div>
                    </div>
                </div> -->
                <div class="col-md-3">
                    <div class="d-flex shadow p-3 rounded bg-primary bg-gradient text-white ">
                        <div class="w-25">
                            <i class="fas fa-calendar-day fa-3x"></i>
                        </div>
                        <div>
                            <h4>
                                <?php
                                    //todays Vehicle Entries
                                    $query=mysqli_query($conn,"select vehicle_id from vehicle where date(In_Time)=CURDATE();");
                                    $count_today_vehentries=mysqli_num_rows($query);
                                    echo $count_today_vehentries;
                                ?>
                            </h4>
                            <h6>Today's Vehicle Entries </h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="d-flex shadow p-3 rounded bg-danger bg-gradient text-white ">
                        <div class="w-25">
                            <i class="fas fa-history fa-3x"></i>
                        </div>
                        <div>
                            <h4>
                                <?php
                                    //yesterdays Vehicle Entries
                                    $query=mysqli_query($conn,"select vehicle_id from vehicle where date(In_Time)=CURDATE()-1;");
                                    $count_yesterday_vehentries=mysqli_num_rows($query);
                                    echo $count_yesterday_vehentries;
                                ?>
                            </h4>
                            <h6>Yesterday's Vehicle Entries</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="d-flex shadow p-3 rounded bg-secondary bg-gradient text-white ">
                        <div class="w-25">
                            <i class="fas fa-calendar-week fa-3x"></i>
                        </div>
                        <div>
                            <h4>
                                <?php
                                    //last 7 days Vehicle Entries
                                    $query=mysqli_query($conn,"select vehicle_id from vehicle where date(In_Time)>=(DATE(NOW()) - INTERVAL 7 DAY);");
                                    $count_week_vehentries=mysqli_num_rows($query);
                                    echo $count_week_vehentries;
                                ?>
                            </h4>
                            <h6>This Week Enteries </h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="d-flex shadow p-3 rounded bg-purple bg-gradient text-white ">
                        <div class="w-25">
                            <i class="fas fa-car fa-3x"></i>
                        </div>
                        <div>
                            <h4>
                                <?php
                                    //total Vehicle Entries
                                    $query=mysqli_query($conn,"select vehicle_id from vehicle");
                                    $count_total_vehentries=mysqli_num_rows($query);
                                    echo $count_total_vehentries;
                                ?>
                            </h4>
                            <h6>Total Vehicle Entries</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">

                <div class="col-md-3">
                    <div class="d-flex shadow p-3 rounded bg-dark bg-gradient text-white">
                        <div class="w-25">
                            <i class="fas fa-parking fa-3x"></i>
                        </div>
                        <div>
                            <h4>
                                <?php
                                    //Total Slots
                                    $query=mysqli_query($conn,"select slot_id from slot");
                                    $count_total_slots=mysqli_num_rows($query);
                                    echo $count_total_slots;
                                ?>
                            </h4>
                            <h6>Total Slots </h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="d-flex shadow p-3 rounded bg-ylwgrn bg-gradient text-white ">
                        <div class="w-25">
                        <i class="fas fa-parking fa-3x"></i>
                        </div>
                        <div>
                            <h4>
                                <?php
                                    //available slots
                                    $query=mysqli_query($conn,"select slot_id from slot where status='0'");
                                    $count_avail_slots=mysqli_num_rows($query);
                                    echo $count_avail_slots;
                                ?>
                            </h4>
                            <h6>Available Slots </h6>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

<?php
    include_once 'footer.php';
?>
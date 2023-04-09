<?php
    $title = "Search Vehicle";
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
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Search Vehicle </label>
                            <input type="search" name="searchvehicle_txt" id="searchvehicle_txt" class="form-control w-25" placeholder="Registration Number">
                        </div>

                        <div id="result_div"></div>

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
        $("#searchvehicle_txt").blur(function(){
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
    });
</script>
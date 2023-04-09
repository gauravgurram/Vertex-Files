<div class="container-fluid bg-dark py-2 text-white">
    <div class="row">
        <div class="col-md-6">
            Copyright &copy; 2022 All Right Reserved
        </div>
        <div class="col-md-6 text-end">
            Developed by Suraj Shimage & Prasad Rodage
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="../assets/js/capitalize.js"></script>
<script type="text/javascript">
    $(function () {
        var page = location.pathname.split('/').pop();
        //alert(page);
        $('.sidebar ul li a[href="' + page + '"]').addClass('live');
    });
</script>

</body>
</html>
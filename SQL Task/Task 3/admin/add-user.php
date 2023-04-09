<?php
    $title = "Add User";
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
    <div class="row shadow rounded my-5 py-4 bg-white">
        <div class="col-md-5 m-auto border shadow-sm rounded">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name_txt" id="name_txt" placeholder="Name" class="form-control" autofocus>
                <h6 id="nameerror_txt"></h6>
            </div>

            <div class="form-group">
                <label for="">Email Id</label>
                <input type="email" name="email_txt" id="email_txt" placeholder="Email Id" class="form-control">
                <h6 id="emailerror_txt"></h6>
            </div>

            <div class="form-group">
                <label for="">Mobile No.</label>
                <input type="tel" name="mobile_txt" id="mobile_txt" placeholder="Mobile No" class="form-control" maxlength="10">
                <h6 id="mobileerror_txt"></h6>
            </div>

            <div class="form-group">
                <label for="">Address</label>
                <textarea name="address_txt" id="address_txt" cols="30" rows="3" placeholder="Address" class="form-control"></textarea>
                <h6 id="addresserror_txt"></h6>
            </div>

            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="username_txt" id="username_txt" placeholder="Username" class="form-control">
                <h6 id="usernameerror_txt"></h6>
            </div>

            <div class="form-group">
                <label for="">ID Proof</label>
                <div class="form-group">
                    <input type="radio" name="idproof_rdo" class="id_rdo" value="Aadhar Card" id="adhr_rdo" checked>&nbsp;<label for="adhr_rdo">Aadhar Card</label>
                    <input type="radio" name="idproof_rdo" class="id_rdo" value="Driving License" id="dl_rdo">&nbsp;<label for="dl_rdo">Driving License</label>
                    <input type="radio" name="idproof_rdo" class="id_rdo" value="Voting Card" id="vtng_rdo">&nbsp;<label for="vtng_rdo">Voting Card</label>
                </div>
                <input type="text" name="idproof_txt" id="idproof_txt" placeholder="Aadhar Card No. (UID)" class="form-control">
                <h6 id="idprooferror_txt"></h6>
            </div>

            <div class="form-group">
                <input type="submit" value="Add User" name="submit_btn" id="submit_btn" class="btn btn-success">
            </div>

        </div>
    </div>
</form>

        </div>
    </div>
</div>

<?php
    if(isset($_POST['submit_btn'])){
        //password create for user
        $length = 8;
        $str = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
        $plain_password = substr(str_shuffle($str), 0, $length);
        //password encryption using SHA512
        // $password = hash('sha512', $plain_password);
        // $password = password_hash($password, PASSWORD_DEFAULT);
        $password = md5($plain_password);

        $user_id = "USR".date("is");
        $name = $_POST['name_txt'];
        $email = $_POST['email_txt'];
        $mobile = $_POST['mobile_txt'];
        $address = $_POST['address_txt'];
        $username = $_POST['username_txt'];
        $idproof_type = $_POST['idproof_rdo'];
        $idproof = $_POST['idproof_txt'];

        $insert_user = "insert into user (user_id, name, email_id, mobile_no, address, username, password, idproof_type, id_proof, status) values ('$user_id','$name','$email','$mobile','$address','$username', '$password', '$idproof_type', '$idproof','0')";
        if(mysqli_query($conn, $insert_user)){
            send_email($email, $username, $plain_password);
            echo '<script>alert("User added successfully!");</script>';
        }else{
            echo '<script>alert("Error : '.mysqli_error($conn).'");</script>';
        }
    }

    function send_email($email, $username, $password){
        require '../assets/PHPMailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;
      
        $host = "smtp.gmail.com";
        $usrname = "website.php07@gmail.com";
        $passwrd = "wpmpgjyjizqpedby";
        $security = "tls";
        $port = 587;
      
        $mail->SMTPDebug = 4; // Enable verbose debug output
      
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host =  $host;// Specify main and backup SMTP servers
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = $usrname; // SMTP username
        $mail->Password = $passwrd; // SMTP password
        $mail->SMTPSecure = $security; // Enable TLS encryption, `ssl` also accepted
        $mail->Port = $port; // TCP port to connect to
      
        $mail->setFrom($usrname, 'Vehicle Parking System');
        $mail->addAddress($email); // Add a recipient
      
        //$mail->addReplyTo($usrname);
      
        $mail->isHTML(true); 
        $mail->CharSet = 'UTF-8';// Set email format to HTML
      
        $mail->Subject = 'Your Account Username and Password';
        $mail->Body = "Dear, User<br><h3>Your account is created & Your credentials are below</h3>Username : ".$username."<br>Password : ".$password."<br><br>Thank You...";

        if(!$mail->send()) {
          echo '<script>alert("Mailer Error: ' . $mail->ErrorInfo.'") </script>';
        } else {
            echo '<script>alert("Username and Password Sent Successfully!") </script>';
        }
    }
?>

<?php
    include_once 'footer.php';
?>

<script>
    $(document).ready(function(){

        var name_err = true;
        var email_err = true;
        var mobile_err = true;
        var address_err = true;
        var username_err = true;
        var idproof_err = true;

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

        //for username
        $("#username_txt").keyup(function(){
            username_check();
        });

        function username_check(){
            var username_val = $("#username_txt").val();

            if (username_val.length=="") {
                $('#usernameerror_txt').html("Username Required.");
                $('#usernameerror_txt').css("color","red").css("display","block");
                username_err = false;
                return false;
            }else{
                $('#usernameerror_txt').hide();
            }
        }

        //for id proof
        $("#idproof_txt").keyup(function(){
            idproof_check();
        });

        function idproof_check(){
            var idproof_val = $("#idproof_txt").val();

            if (idproof_val.length=="") {
                $('#idprooferror_txt').html("Id Proof Required.");
                $('#idprooferror_txt').css("color","red").css("display","block");
                idproof_err = false;
                return false;
            }else{
                $('#idprooferror_txt').hide();
            }
        }

        //on button click
        $('#submit_btn').click(function(){

        var name_err = true;
        var email_err = true;
        var mobile_err = true;
        var address_err = true;
        var username_err = true;
        var idproof_err = true;

        name_check();
        email_check();
        mobile_check();
        address_check();
        username_check();
        idproof_check();

        if((name_err==true) && (email_err==true) && (mobile_err==true) && (address_err==true) && (username_err==true) && (idproof_err==true)){
            return true;
        }else{
            return false;
        }

        });

    });
</script>

<script>
    $(document).ready(function(){
        $('input[type=radio][name=idproof_rdo]').change(function(){
            if(this.value == "Driving License"){
                $("#idproof_txt").attr("placeholder","Driving License No.");
            } else if(this.value == "Voting Card"){
                $("#idproof_txt").attr("placeholder","Voting Card No.");
            }else{
                $("#idproof_txt").attr("placeholder","Aadhar Card No.(UID)");
            }
        });
    });
</script>
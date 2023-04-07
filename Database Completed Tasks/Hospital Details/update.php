<?php 
require('config.php');
$id=$_GET['id'];
$sql="select * from hospitaldetails where id='$id';";
$rs=mysqli_query($con,$sql);
$rw=mysqli_fetch_row($rs);
?>
<html>
    <head>
        <title>Hospital Management
</title>
    </head>
    <body>
        <form method="post">
            Patient Name : <input type="text" name="pname" required value="<?php echo $rw[1]?>"><br><br>
            Gender : <input type="radio" name="male" value="Male" required <?php echo $rw[2]=='Male'?'Checked':''?>>Male
                        <input type="radio" name="male" value="Female" required <?php echo $rw[2]=='Female'?'Checked':'';?>>Female <br><br>
            Age : <input type="text" name="age" required value="<?php echo $rw[3];?>"><br><br>
            Email : <input type="text" name="email" required value="<?php echo $rw[4];?>"><br><br>
            Contact No : <input type="text" name="contact" required value="<?php echo $rw[5];?>"><br><br>
            Address : <input type="text" name="address1" required value="<?php echo $rw[6];?>"><br><br>
            disease : <input type="text" name="disease" required value="<?php echo $rw[7];?>"><br><br>
            <input type="submit" name="btn1" value="Update To Database">
        </form>
    </body>
</html>
<?php 
require('config.php');
if(isset($_POST['btn1']))
{
$name=$_POST['pname'];
$gender=$_POST['male'];
$age=$_POST['age'];
$email=$_POST['email'];
$contact=$_POST['contact'];
$address=$_POST['address1'];
$disease=$_POST['disease'];
$sql1="update hospitaldetails set patient_name='$name',patient_gender='$gender',patient_age='$age',patient_email='$email',patient_contact='$contact',patient_address='$address',patient_disease='$disease' where id='$id'";
if(mysqli_query($con,$sql1))
{
    echo "<script>alert('Data successfully Updated');</script>";
    header('location:fetch.php');
}
else
{
    echo mysqli_error($con);
}
}
?>
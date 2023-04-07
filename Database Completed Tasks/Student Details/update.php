<?php 
require('config.php');
$id=$_GET['id'];
$sql="select * from studentdetails where id='$id';";
$rs=mysqli_query($con,$sql);
$rw=mysqli_fetch_row($rs);  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student Details</title>
    <style>
        .main{
            border-style: solid;
            border-color: black;
            margin: auto;
            width:30%;
            height:80%;
            text-align: center;
            border-radius: 15px;
            background-color: darkgray;
        }

        input[type=text]{
            width:auto;
            height: auto;
            margin: auto;
            border-radius: 5px;
        }
        input[type=password]{
            width:auto;
            height: auto;
            margin: auto;
            border-radius: 5px;
        }
        select{
            width:90%;
            border-color: black     ;
            height: auto;
            margin: auto;
            border-radius: 5px;
        }
        table{
            margin: auto;
            padding: 3%;
        }
        tr,td{
            padding:2%;
            width: 35%;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
        }
        h1{

            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            font-style: normal;
            text-decoration: underline;
            color:darkgreen;
        }
        input[type=submit]
        {
            border-radius:5px;
            width:30%;
            background-color: darkgreen;
            font-size: large;
            font-weight: bold;
            border-style: none;
            color: aliceblue;
            height: 40px;
        }
    </style>
</head>
<body>
    <form method="post">
        <div class="main">
            <h1>Update Student Details</h1>
            <table>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name1" value="<?php echo $rw[1];?>"></td>
                </tr>
                
                <tr>
                    <td>Gender</td>
                    <td><input type="radio" name="gender1" value='Male' <?php echo $rw[2]=='Male'?'checked':'';?> >Male</td>
                    <td><input type="radio" name="gender1" value='Female' <?php echo $rw[2]=='Female'?'checked':'';?>>Female</td>
                </tr>

                <tr>
                    <td>Branch </td>
                    <td><select name="branch1">
                        <option name="CS" value="CS" <?php echo $rw[3]=='CS'?'selected':'';?>>CS</option>
                        <option name="IT" value="IT" <?php echo $rw[3]=='IT'?'selected':'';?>>IT</option>
                        <option name="ME" value="ME" <?php echo $rw[3]=='ME'?'selected':'';?>>ME</option>
                        <option name="AE" value="AE" <?php echo $rw[3]=='AE'?'selected':'';?>>AE</option>
                    </select>
                </td>
                </tr>
                <tr>
                    <td>Percentage</td>
                    <td><input type="number" name="percent1"  value="<?php echo $rw[4];?>"></td>
                </tr>
                <tr>
                    <td>Contact</td>
                    <td>
                        <input type="number" name="contact1"  value="<?php echo $rw[5];?>">
                    </td>
                </tr>
            </table><br>
            <input type="submit" name="btn1" value="Update"><br><br>
        </div>
    </form>
</body>
</html>
<?php 
if(isset($_POST['btn1']))
{
$name=$_POST['name1'];
$gender=$_POST['gender1'];
$branch=$_POST['branch1'];
$percentage=$_POST['percent1'];
$contact=$_POST['contact1'];
$sql1="update studentdetails set name='$name',gender='$gender',branch='$branch',percentage='$percentage',contact='$contact' where id='$id'";

if(mysqli_query($con,$sql1))
{
    echo "<script>alert('Data Successfully Updated');</script>";
    header('location:fetch.php');
    
}
else
{
    echo mysqli_error($con);
}
}
?>
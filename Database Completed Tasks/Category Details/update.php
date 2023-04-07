<?php 
require('config.php');
$id=$_GET['id'];
$sql="select * from categorydetails where id='$id';";
$rs=mysqli_query($con,$sql);
$rw=mysqli_fetch_row($rs);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Details</title>
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
            <h1>Category Details</h1>
            <table>
                <tr>
                    <td>Category Name</td>
                    <td><input type="text" name="name" value="<?php echo $rw[1];?>"></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td><input type="text" name="status" value="<?php echo $rw[2];?>"></td>
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
    $name=$_POST['name'];
    $status=$_POST['status'];
 
    $sql1="update categorydetails set cat_name='$name',status='$status' where id='$id'";

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
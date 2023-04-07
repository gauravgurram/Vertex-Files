<?php 
$con=mysqli_connect("localhost","root","","sample");
$id=$_GET['id'];
$sql="select * from product where id='$id';";
$rs=mysqli_query($con,$sql);
$rw=mysqli_fetch_row($rs);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comapany Details</title>

    <style>
        table
        {
            margin:20px auto !important;
            text-align:center;
            
        }
        h1{
            margin:auto;
        }

        table{
            margin:auto;
            text-align:center;
            width:70%;
            height:30%; 
            color:green;
            margin-top:5%;
            font-size:25px;
            font-weight:bold;
        }
        tr,td{
            width:10%;
            padding:15px;
        }

        h1{
            text-align:center;
        }

    input[type=submit]
    {
        width:20%;
        height:40px;
        font-size:20px;
        color:green;
        font-weight:bold;
        border-radius: 10px;
        border-color:beige
    }

    input[type=file]
    {
        width:60%;
        height:40px;
        font-size:20px;
        color:green;
        font-weight:bold;
        
        border-color:beige
    }

    input[type=text]
{
    width:70%;
    height:30px;
    font-size:20px;
    color:green;
    font-weight:bold;
    border-radius: 10px;
    border-color:beige
}

  
    </style>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <div class="main">
            <table border="1" rules="all">
                <tr>
                    <td>Product Name : </td>
                    <td><input type="text" name="prname" value="<?php echo $rw[1]?>"></td>
                </tr>
                <tr>
                    <td>Previous Uploaded Image : </td>
                    <td><input type="image" name="file" src="<?php echo $rw[2]?>" width="300"></td>
                </tr>
                <tr>
                    <td>Product Image : </td>
                    <td><input type="file" name="file" value="<?php echo $rw[2]?>" required></td>
                </tr>
                <tr>
                    <td>
                        Product Discription :
                    </td>
                    <td>
                        <input type="text" name="discrip" value="<?php echo $rw[3]?>">
                    </td>

                </tr>
                <tr>
                    <td>Product Price :</td>
                    <td>
                        <input type="text" name="price" value="<?php echo $rw[4]?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2"> <input type="submit" name="submit" value="Update Details"></td>
                </tr>
            </table>
        </div>
    </form>
</body>
</html>
<?php 
if(isset($_POST['submit']))
{
    $name=$_POST['prname'];
    $filename=$_FILES['file']['name'];
    $filesize=$_FILES['file']['size'];
    $filetype=$_FILES['file']['type'];
    $filetmpname=$_FILES['file']['tmp_name'];
    $filestore="images/".$filename;

    move_uploaded_file($filetmpname,$filestore);
    $discrip=$_POST['discrip'];
    $price=$_POST['price'];
    $sql="update product set pname='$name',pimage='$filestore',pdiscrip='$discrip',price='$price' where id='$id'";
    if(mysqli_query($con,$sql))
    {
        echo "Updated";
        header('Location:productcrud.php');
    }
    else
    {
        echo "Not Updated";
    }
}
?>
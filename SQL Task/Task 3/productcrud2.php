<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
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
    <h1>Enter Product Details</h1>
        <div class="main">
            <table border="1" rules="all">
                <tr>
                    <td>Product Name : </td>
                    <td><input type="text" name="prname"></td>
                </tr>
                <tr>
                    <td>Product Image : </td>
                    <td><input type="file" name="file" required></td>
                </tr>
                <tr>
                    <td>
                        Product Discription :
                    </td>
                    <td>
                        <input type="text" name="discrip">
                    </td>

                </tr>
                <tr>
                    <td>Product Price :</td>
                    <td>
                        <input type="text" name="price">
                    </td>
                </tr>
                <tr>
                    <td colspan="2"> <input type="submit" name="submit" value="Add To Database"></td>
                </tr>
            </table>
        </div>
  
<?php 

$con=mysqli_connect("localhost","root","","sample");
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

    $sql="insert into product(pname,pimage,pdiscrip,price) values('$name','$filestore','$discrip','$price')";
    mysqli_query($con,$sql);

}
?>

<!---fetch the data from database-->

<div class="main2">
 <h1>Product Details From Database</h1>
 <table border='1'  align='center'>
<tr>
<th>Product Name</th>
<th>Product Image</th>
<th>Product Discription</th>
<th>Product Price</th>
<th colspan='2'>Action</th> 
</tr>
<?php
$sql="select * from product";
$rs=mysqli_query($con,$sql);
while($rw=mysqli_fetch_row($rs))
{
?>
<tr>
    <td><?php echo $rw[1];?></td>
    <td><a href="<?php echo $rw[2]?>"><img src="<?php echo $rw[2]?>" width="200" height="200"></a></td>
    <td><?php echo $rw[3];?></td>
    <td><?php echo $rw[4];?></td>
    <td><a href='delete.php?id=<?php echo $rw[0]?>'>Delete</a></td>
    <td><a href='update.php?id=<?php echo $rw[0];?>'>Update</a></td>
</tr>
<?php
}
?>
</div>
</table>
</form>
 </body>
 </head>


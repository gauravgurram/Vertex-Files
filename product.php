<?php
$con=mysqli_connect("localhost","root","","forenkey");
if(isset($_POST['btn']))
{
    $filename=$_FILES['file']['name'];
    $filesize=$_FILES['file']['size'];
    $filetmpname=$_FILES['file']['tmp_name'];
    $filetype=$_FILES['file']['type'];
    $filestore="image/".$filename;
  
    $productname=$_POST['t1'];
    $productprice=$_POST['t2'];
    $productdiscription=$_POST['t3'];
    if(move_uploaded_file($filetmpname,$filestore))
    {
        echo "uplaod<br>";
    }
    else 
    {
        echo "error<br>";
    }
$sql="insert into productdatabase (productname,productprice,ProductDiscription,imagestore)
values ('$productname','$productprice','$productdiscription','$filestore')";
if(mysqli_query($con,$sql))
{
    echo "<script>alert('yeha')</script>";
}
else 
{
    echo mysqli_error($con);
}
}
if(isset($_GET['id']))
{
$i=($_GET['id']);
$sql2= "delete from productdatabase where id=$i";
if(mysqli_query($con,$sql2))
{
    echo"<script>alert('deleted')</script>";
    header ('Location:product.php');
}
else 
{
    echo mysqli_error($con);
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  <style>
      .main {
    
     width : 20%;   
     box-shadow: 0 0 10px red;
     text-align: center;
     padding: 20px;
     border-radius: 4px;
     border:1px solid red;
     /* margin-top:5%; */
     margin-left:40%;
     margin-right:40%;
    }

    .sub 
    {
        padding:5px;
    }

    .btn 
    {
        width: 100%;
        padding : 10px;
        background-color: green;
        outline: none;
        border:none;
    }
   
  </style>
</head>
<body class="fl">
<div>
    <div class="main">
         <form action="" method="post" enctype="multipart/form-data">
        <label><b>Product Name</b></label> <br><input class="sub" type="text" name="t1"><br><br>
        <label><b>Product Amount</b></label> <br><input class="sub" type="text" name="t2"><br><br>
        <label><b>Product Discription</b> <br></label><input class="sub" type="text" name="t3"><br><br>
        <label><b>Product Image</b><br></label><input class="sub" type="file" name="file"><br><br>
        <input class="btn" type="submit" name="btn">  
     </form>

</div>
</div>
       <div ><br>
        <table border="1" rules="all" width="100%">
          <tr>
            <th>Product Name</th>
            <th>Product Amount</th>
            <th>Product Discription</th>
            <th>Product Image</th>
            <th>Update</th>
            <th>Delete</th>
            <?php
            $sql1='select * from productdatabase';
            $rs=mysqli_query($con,$sql1);
            while($rw=mysqli_fetch_row($rs))
            {
                ?>
                <tr>
                    <td><?php echo $rw[1];?></td>
                    <td><?php echo $rw[2];?></td>
                    <td><?php echo $rw[3];?></td>
                    <td><img src="<?php echo $rw[4];?>" width="200px" height="100px"/></td>
                    <td><a href="updateupload.php?id=<?php echo $rw[0];?>">Update</a></td>
                   <td><a href="product.php?id=<?php echo $rw[0];?>">delete</a></td>
                </tr>             
                <?php
            }
            ?>
        </table>    
    </div>
</body>
</html> 
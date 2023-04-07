<?php
$con=mysqli_connect("localhost","root","","forenkey");
$sql="select * from productdatabase";
$rs=mysqli_query($con,$sql);
$rw=mysqli_fetch_row($rs);
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
         <form method="post" enctype="multipart/form-data">
        <label><b>Product Name</b></label> <br><input class="sub" type="text" name="t1" value="<?php echo $rw[1]?>"><br><br>
        <label><b>Product Amount</b></label> <br><input class="sub" type="text" name="t2" value="<?php echo $rw[2];?>"><br><br>
        <label><b>Product Discription</b> <br></label><input class="sub" type="text" name="t3" value="<?php echo $rw[3];?>"><br><br>
        <label><b>Product Image</b><br></label><input class="sub" type="file" name="file" src="<?php echo $rw[4]?>"><br><br>
        <input class="btn" type="submit" name="btn" value="Update">  
     </form>
</div>
</body>
</html> 

<?php

if(isset($_POST['btn']))
{
    $productname=$_POST['t1'];
    $productprice=$_POST['t2'];
    $productdiscription=$_POST['t3'];
    $id=$_GET['id'];
    $filename=$_FILES['file']['name'];
    $filesize=$_FILES['file']['size'];
    $filetmpname=$_FILES['file']['tmp_name'];
    $filetype=$_FILES['file']['type'];
    $filestore="image/".$filename;
 
    $sql1="update productdatabase set productname='$productname', productprice='$productprice', ProductDiscription='$productdiscription', imagestore='$filestore' where id='$id'";

    if(mysqli_query($con,$sql1))
    {
        header ('Location:product.php');
    }
    else {
        echo mysqli_error($con);
    }
}

?>
<?php
require('config1.php');
$message;
$message1;
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $status=$_POST['active'];
    $sql="insert into category(catname,status) values('$name','$status')";
    if(mysqli_query($con,$sql))
    {
        $message="Record inserted";
    }
    else
    {
        $message="Not inserted";
    }
}
if(isset($_POST['save']))
{
    $name=$_POST['categoryname'];
    $pname=$_POST['pname'];
    $dname=$_POST['dname'];
    $prise=$_POST['prise'];
    $sql2="insert into product(cate_id,pname,pdec,prise)values('$name','$pname','$dname','$prise')";
    if(mysqli_query($con,$sql2))
    {
        $message1=" Record Inserted Successfully";
    }
    else
    {
        $message1="Sorry Record Not Inserted";
    }
}

?>

<html>
<head>
    <title>
       Category and Product 
    </title>
    <style>
        *{
            margin:0;
            padding:0;
            
        }
        body{
            display:flex;
        }
        .div1{
             width:50%; 
            height:50%;
            /* box-shadow:0 0 10px black; */
            /* padding: 100px; */
        }
        .div1 .category{
           /* padding:100px 100px 0 200px; */
            box-shadow:0 0 10px green;
            height:50%;
            margin:50px 0 0 150px;
            width:50%;
            border-radius:10px;
            height:200px;
        }
        .category .inputbox{
            padding:10px;
        }
        .category .inputbox .inputholder{
            padding:5px;
        }
        .inputholder input{
            width:100%;
            padding:5px;
        }
        .btn{
            width:30%;
            background-color:blue;
            color:white;
            border:none;
            border-radius:5px;
            height:25px;
            cursor:pointer;
        }
        .div2{
            width:50%; 
            height:50%;
            /* box-shadow:0 0 10px black; */
        }
        .div2 .product{
            box-shadow:0 0 10px green;
            height:50%;
            margin:50px 0 0 150px;
            width:50%;
            border-radius:10px;
            height:390px;
        }
        .product select{
            padding:5px;
            width:100%;
        }
        .product .inputbox{
            padding:10px;
        }
        .product .inputbox .inputholder{
            padding:5px;
        }
        .product .inputholder input{
            width:100%;
            padding:5px;
        }
        
    </style>
</head>
<div class="div1">
    
    <div class="category">
        <label for="" style="margin-top:15px;font-size:25px; font-weight:bold;"><center>Category Form</center></label>
        <form method="post">
        <div class="inputbox">
          <label for="">Category Name:</label>
          <div class="inputholder"><input type="text" name="name"></div>
        </div>
        
        <div class="inputbox">
           <label for=""> Status: </label> 
           <div style="margin-top:5px;">&emsp;<input type="radio" name="active" value="Active"> Active &emsp;&emsp; <input type="radio" name="active" value="Inactive"> Inactive</div>
      </div>
      <center><input type="submit" value"Save" name="submit" class="btn"></center>
    </form>
    </div>
    <h3 align="center"><?php echo (isset($message))?$message:''?></h3>
</div>
<div class="div2">

    <div class="product">
        <label for="" style="margin-top:15px;font-size:25px; font-weight:bold;"><center>Product Form</center></label>
        <form method="post">
        <div class="inputbox">
          <label for="">Select Category Name:</label>
         <div class="inputholder">
              <select name="categoryname">
                <option value="">Select Category Name</option>
                <?php
                $sql1="select * from category";
                $rs=mysqli_query($con,$sql1);
                while($rw=mysqli_fetch_row($rs))
                {
                ?>
                <option value="<?php echo $rw[0]; ?>"><?php echo $rw[1];?></option>
                    <?php
                }
                    ?>
             </select>
         </div>
        </div>
        
        <div class="inputbox">
           <label for=""> Product Name: </label> 
           <div class="inputholder"><input type="text" name="pname" placeholder="Product Name"></div>
        </div>
        <div class="inputbox">
           <label for=""> Product Description: </label> 
           <div class="inputholder"><input type="text" name="dname" placeholder="Product Description"></div>
        </div>
        <div class="inputbox">
           <label for=""> Product Prise: </label> 
           <div class="inputholder"><input type="text" name="prise" placeholder="Product Prise"></div>
        </div>
      <center><input type="submit" value"Save" name="save" class="btn"></center>
            </form>
    </div>
    
<h3 align="center"><?php echo (isset($message1))?$message1:''?></h3>
</div>
</html>
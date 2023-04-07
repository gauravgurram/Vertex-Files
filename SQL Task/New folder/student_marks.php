<?php
require('config1.php');
$message;
$message1;
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $roll=$_POST['roll'];
    $sql="insert into student(name,gender,roll) values('$name','$gender','$roll')";
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
    $name=$_POST['studentname'];
    $class=$_POST['class'];
    $marks=$_POST['marks'];
    $sql2="insert into marks(s_id,class,tmarks)values('$name','$class','$marks')";
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
       Student And Marks 
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
            height:300px;
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
            height:300px;
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
        <label for="" style="margin-top:15px;font-size:25px; font-weight:bold;"><center>Student Form</center></label>
        <form method="post">
        <div class="inputbox">
          <label for="">Student Name:</label>
          <div class="inputholder"><input type="text" name="name"></div>
        </div>
        
        <div class="inputbox">
           <label for=""> Gender: </label> 
           <div style="margin-top:5px;">&emsp;<input type="radio" name="gender" value="Male"> Male &emsp;&emsp; <input type="radio" name="gender" value="Female"> Female</div>
        </div>

        <div class="inputbox">
          <label for="">Student Roll No:</label>
          <div class="inputholder"><input type="text" name="roll"></div>
        </div>
      <center><input type="submit" value"Save" name="submit" class="btn"></center>
    </form>
    </div>
    <h3 align="center" style="margin-top:10px;"><?php echo (isset($message))?$message:''?></h3>
</div>
<div class="div2">

    <div class="product">
        <label for="" style="margin-top:15px;font-size:25px; font-weight:bold;"><center>Mark Form</center></label>
        <form method="post">
        <div class="inputbox">
          <label for="">Select student Name:</label>
         <div class="inputholder">
              <select name="studentname">
                <option value="">Select Student Name</option>
                <?php
                $sql1="select * from student";
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
           <label for=""> Class: </label> 
           <div class="inputholder"><input type="text" name="class" placeholder="Student Class"></div>
        </div>
        <div class="inputbox">
           <label for=""> Total Marks </label> 
           <div class="inputholder"><input type="text" name="marks" placeholder="Total marks"></div>
        </div>
        
      <center><input type="submit" value"Save" name="save" class="btn"></center>
            </form>
    </div>
    
<h3 align="center" style="margin-top:10px;"><?php echo (isset($message1))?$message1:''?></h3>
</div>
</html>
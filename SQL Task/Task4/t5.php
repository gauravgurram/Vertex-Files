<?php 
require('config.php');
if(isset($_POST['submit1']))
{
    $name=$_POST['sname'];
    $sql1="insert into customers(first_name) values('$name')";
    mysqli_query($con,$sql1);
}
if(isset($_POST['submit2']))
{
    $amount=$_POST['amount'];
    $custid=$_POST['custid'];
    $sql1="insert into orders(amount,customer) values('$amount','$custid')";
    mysqli_query($con,$sql1);
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
        #t1,#t2{
            margin: 20px auto !important;
            height: auto;
            text-align: center;
            
        }
        tr,td{
            width:30%;
            height:60px;
        }
        input[type=text], input[type=number]
        {
            width: 50%;
            height:50%;
            border-radius: 10px;
            border-color: rgb(116, 240, 55);
            font-size: large;
        }
        ::placeholder
        {
            text-align: center;
           
            font-size: large;
        }
        input[type=submit]
        {
            width: 30%;
            height:70%;
            border-radius: 10px;
            background-color: orangered;
            font-size: larger;
            color: antiquewhite;
            font-weight: bolder;
            border-color: orangered;
        }
        #marksform
        {
            width: 50%;
            height:60%;
            border-radius: 7px;
            border-color: rgb(116, 240, 55);
            font-size: large;
        }
            .div1
            {
                width:40%;   
                float:left;
                margin-left:5%;
                border-color:rgb(198, 175, 175);
                border-style:solid;
            }
            .div2
            {
                width:40%;
                margin-right:5%;
                float:right;
                border-color:rgb(198, 147, 147);
                border-style:solid;
            }
            .div3
            {
                width:40%;
                margin-top:10%;
                margin-bottom:10%;
                margin-left: 10%;
                margin-right: 30%;
                float:right;
                border-color:rgb(198, 147, 147);
                border-style:solid;
            }
        </style>
</head>
<body>
    <form method="post">
        <div class="div1">
<h1><center>Customer</center></h1>
<table id="t1">
                        <tr>
                            <td><input type="text" name="sname" placeholder="Customer Name"></td>
                        </tr>
            
                        <td colspan="2"><input type="submit" name="submit1" value="Add"></td>
                      </tr>  
                </table>

    <table id="t2" border="1" rules="cols">
            <tr>
            <th>customer_id</th>
            <th>first_name</th>
            </tr>
            <?php
                require('config.php');
                

                    $sql="select * from customers";
                    $rs=mysqli_query($con,$sql);
                    while($rw=mysqli_fetch_row($rs))
                    {
                    ?>
                    <tr>
                        <td><?php echo $rw[0];?></td>
                        <td><?php echo $rw[1];?></td>
                    </tr>
                    <?php
                    }
                    ?>
                   <br><br>
            
</table>
                </div>
<div class="div2">
<h1><center>Order</center></h1>
<table id="t1">
                        <tr>
                            <td><input type="number" name="amount" placeholder="Amount"></td>
                        </tr>
                        <tr>
                            <?php   
                            $sql2="select * from customers";
                            $rs=mysqli_query($con,$sql2);  
                            $rw=mysqli_fetch_row($rs); 
                            ?>
                            <td><input type="number" name="custid" value="<?php echo $rw[0]?>"></td>
                             </tr>
                        <td colspan="2"><input type="submit" name="submit2" value="Add"></td>
                      </tr>  
                </table>

    <table id="t2" border="1" rules="cols">
            <tr>
            <th>order_id</th>
            <th>amount</th>
            <th>customer</th>
            </tr>
            <?php
                    $sql="select * from orders";
                    $rs=mysqli_query($con,$sql);
                    while($rw=mysqli_fetch_row($rs))
                    {
                    ?>
                    <tr>
                        <td><?php echo $rw[0];?></td>
                        <td><?php echo $rw[1];?></td>
                        <td><?php echo $rw[2];?></td>
                    </tr>
                    <?php
                    }
                    ?>
                   <br><br>
            
</table>
                </div>

<div class="div3">                
<h1><center>Join</center></h1>
    <table id="t2" border="1" rules="cols">
            <tr>
            <th>customer_id</th>
            <th>first_name</th>
            <th>amount</th>
            </tr>
            <?php
                require('config.php');
                

                    $sql="select * from customers inner join orders on customers.customer_id=orders.customer";
                    $rs=mysqli_query($con,$sql);
                    while($rw=mysqli_fetch_row($rs))
                    {
                    ?>
                    <tr>
                        <td><?php echo $rw[0];?></td>
                        <td><?php echo $rw[1];?></td>
                        <td><?php echo $rw[3];?></td>
                    </tr>
                    <?php
                    }
                    ?>
            <br><br>
            
</table>
                </div>
</form>
</body>
</html>
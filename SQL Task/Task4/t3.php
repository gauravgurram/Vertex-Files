<?php 
require('config.php');
if(isset($_POST['submit1']))
{
    $name=$_POST['sname'];
    $sql1="insert into table1(name) values('$name')";
    mysqli_query($con,$sql1);
}
if(isset($_POST['submit2']))
{
    $id=$_POST['id'];
    $stream=$_POST['stream'];
    $sql1="insert into table2(id,stream) values('$id','$stream')";
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
        </style>
</head>
<body>
    <form method="post">
<h1><center>Table 1</center></h1>
<table id="t1">
                        <tr>
                            <td><input type="text" name="sname" placeholder="Name"></td>
                        </tr>
                        <td colspan="2"><input type="submit" name="submit1" value="Add"></td>
                      </tr>  
                </table>

    <table id="t2" border="1">
            <tr>
            <th>ID</th>
            <th>Name</th>
            </tr>
            <?php
                require('config.php');
                
                    $sql="select * from table1";
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

<br>
<h1><center>Table 2</center></h1>
<table id="t1">
                       
                        <tr>
                            <?php   
                            $sql2="select * from table1";
                            $rs=mysqli_query($con,$sql2);  
                            $rw=mysqli_fetch_row($rs); 
                            ?>
                            <td><input type="number" name="id" value="<?php echo $rw[0]?>" placeholder="ID"></td>
                        </tr>
                
                        <tr>
                            <td><input type="text" name="stream" placeholder="Stream"></td>
                        </tr>
                        <tr>    
                        <td colspan="2"><input type="submit" name="submit2" value="Add"></td>
                        </tr>  
                </table>

    <table id="t2" border="1" >
            <tr>
            <th>ID</th>
            <th>Stream</th>
            </tr>
            <?php
                    $sql="select * from table2";
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

<br>
<h1><center>Inner Join</center></h1>
    <table id="t2" border="1" >
            <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Stream</th>
            </tr>
            <?php
                require('config.php');
                

                    $sql="select * from table1 inner join table2 on table1.id=table2.id";
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

</form>
</body>
</html>
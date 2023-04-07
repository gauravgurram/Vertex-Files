<?php 
$con=mysqli_connect("localhost","root","","test");
if($con)
{
    echo "connected";
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
<div class="div3">                
<h1><center>Join</center></h1>
    <table id="t2" border="1" rules="cols">
            <tr>
            <th>First_Name</th>
            <th>Last_Name</th>
            <th>Start time</th>
            <th>End time</th>
            <th>Outcome</th>
            </tr>
            <?php
                    $sql="select * from employee inner join  call_1 on employee.id=call_1.id
                    inner join  outcome on employee.id=outcome.id";
                    $rs=mysqli_query($con,$sql);
                    while($rw=mysqli_fetch_row($rs))
                    {
                    ?>
                    <tr>
                        <td><?php echo $rw[1];?></td>
                        <td><?php echo $rw[2];?></td>
                        <td><?php echo $rw[6];?></td>
                        <td><?php echo $rw[7];?></td>
                        <td><?php echo $rw[10];?></td>
                      
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
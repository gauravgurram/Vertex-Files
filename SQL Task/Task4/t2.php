<?php 
require('config.php');
if(isset($_POST['submit1']))
{
    $name=$_POST['sname'];
    $branch=$_POST['branch'];
    $sql1="insert into student(name,branch) values('$name','$branch')";
    mysqli_query($con,$sql1);
}
if(isset($_POST['submit2']))
{
    $erollno=$_POST['erollno'];
    $scode=$_POST['scode'];
    $marks=$_POST['marks'];
    $pcode=$_POST['pcode'];
    $sql1="insert into exam(rollno,s_code,marks,p_code) values('$erollno','$scode','$marks','$pcode')";
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
<h1><center>Student</center></h1>
<table id="t1">
                        <tr>
                            <td><input type="text" name="sname" placeholder="Name"></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="branch" placeholder="Branch"></td>
                        </tr>
            
                        <td colspan="2"><input type="submit" name="submit1" value="Add"></td>
                      </tr>  
                </table>

    <table id="t2" border="1" rules="cols">
            <tr>
            <th>Roll No</th>
            <th>Name</th>
            <th>Branch</th>
            </tr>
            <?php
                require('config.php');
                
                    $sql="select * from student";
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

<br>
<h1><center>Exam</center></h1>
<table id="t1">
                       
                        <tr>
                            <?php   
                            $sql2="select * from student";
                            $rs=mysqli_query($con,$sql2);  
                            $rw=mysqli_fetch_row($rs); 
                            ?>
                            <td><input type="number" name="erollno" value="<?php echo $rw[0]?>" placeholder="Roll No"></td>
                        <tr>
                            <td><input type="text" name="scode" placeholder="S_Code"></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="marks" placeholder="Marks"></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="pcode" placeholder="P_Code"></td>
                        </tr>
                        </tr>
                        <td colspan="2"><input type="submit" name="submit2" value="Add"></td>
                      </tr>  
                </table>

    <table id="t2" border="1" rules="cols">
            <tr>
            <th>Roll No</th>
            <th>S_Code</th>
            <th>Marks</th>
            <th>P_Code</th>
            </tr>
            <?php
                    $sql="select * from exam";
                    $rs=mysqli_query($con,$sql);
                    while($rw=mysqli_fetch_row($rs))
                    {
                    ?>
                    <tr>
                        <td><?php echo $rw[0];?></td>
                        <td><?php echo $rw[1];?></td>
                        <td><?php echo $rw[2];?></td>
                        <td><?php echo $rw[3];?></td>
                    </tr>
                    <?php
                    }
                    ?>
                   <br><br>
            
</table>

<br>
<h1><center>Join</center></h1>
    <table id="t2" border="1" rules="cols">
            <tr>
            <th>Roll NO</th>
            <th>Name</th>
            <th>Branch</th>
            <th>Marks</th>
            <th>SCODE</th>
            <th>PCODE</th>

            </tr>
            <?php
                require('config.php');
                

                    $sql="select * from student inner join exam on student.rollno=exam.rollno";
                    $rs=mysqli_query($con,$sql);
                    while($rw=mysqli_fetch_row($rs))
                    {
                    ?>
                    <tr>
                        <td><?php echo $rw[0];?></td>
                        <td><?php echo $rw[1];?></td>
                        <td><?php echo $rw[2];?></td>
                        <td><?php echo $rw[5];?></td>
                        <td><?php echo $rw[4];?></td>
                        <td><?php echo $rw[6];?></td>
                    </tr>
                    <?php
                    }
                    ?>
            <br><br>
            
</table>

</form>
</body>
</html>
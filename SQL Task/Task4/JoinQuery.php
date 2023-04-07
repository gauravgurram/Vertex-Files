
<?php 

$con=mysqli_connect("localhost","root","","test");
if(isset($_POST['submit1']))
{
    $name=$_POST['sname'];
    $gender=$_POST['gender'];
    $roll=$_POST['sroll'];
    $sql1="insert into student(sname,gender,rollno) values('$name','$gender','$roll')";
    mysqli_query($con,$sql1);
}

if(isset($_POST['submit2']))
{
    $roll1=$_POST['roll'];
    $sclass=$_POST['sclass'];
    $sroll1=$_POST['sroll1'];
    $sql4="insert into marks(srollno,class,marks) values('$roll1','$sclass','$sroll1')";
    mysqli_query($con,$sql4);
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
        .student{
            width:50%;
            height:auto;
            margin-right: auto;
            border-style: solid;
            border-color: black;
            border-radius: 10px;
        }

        #t1{
            margin: 20px auto !important;
            height: auto;
            border-style: none;
            text-align: center;
            border-style: hidden;
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
        #t2{
            margin: auto;
            text-align: center;
            width: 90%;
        }
        h1{
            color:green;
            margin: 20px auto !important;
            width:50%;
            background-color: greenyellow;
        }
        .marks{
            width:45%;
            margin-top: -44.5%;
            margin-left: auto;
            height:700px;
            border-style: solid;
            border-color: black;
            border-radius: 10px;
        }
        input[type=radio]
        {
            width: 20%;
            height:30%;
            border-color: rgb(116, 240, 55);
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
        <div class="student">
            <h1><center>Student Form</center></h1>
                <table id="t1">
                        <tr>
                            <td><input type="text" name="sname" placeholder="Student Name"></td>
                        </tr>
                        <tr>
                            <td>Male<input type="radio" name="gender" value="Male"> Female<input type="radio" name="gender" value="Female"></td>
                      </tr> 
                      <tr>
                        <td><input type="number" name="sroll" placeholder="Student Roll No."></td>
                  </tr> 
                      <tr>
                        <td colspan="2"><input type="submit" name="submit1" value="Add"></td>
                      </tr>  
                </table>
        <h1><center>DataBase</center></h1>
        
        
                <table id="t2" border="1"rules="all">
                    <tr>
                    <th>Sr.</th>
                    <th>Student Name</th>
                    <th>Student Gender</th>
                    <th>Student Roll No.</th>
                    </tr>
                    <?php
                    $sql2="select * from student";
                    $rs2=mysqli_query($con,$sql2);
                    while($rw2=mysqli_fetch_row($rs2))
                    {
                    ?>
                    <tr>
                        <td><?php echo $rw2[0];?></td>
                        <td><?php echo $rw2[1];?></td>
                        <td><?php echo $rw2[2];?></td>
                        <td><?php echo $rw2[3];?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
                <br><br>
                </div>


<!-------------------------------------------------------------------------------------------------------------------------------->


        <div class="marks">
    <h1><center>Marks Form</center></h1>
        <table id="t1">
                <tr>
                    <td><select id="marksform" name="roll">
                        <option>Select Student Name</option>

                        <?php
                    $sql2="select * from student";
                    $rs2=mysqli_query($con,$sql2);
                    while($rw2=mysqli_fetch_row($rs2))
                    {
                    ?>
                      <?php echo $rw2[1];?>
                        <option  value=" <?php echo $rw2[3];?>"> <?php echo $rw2[1];?></option>
                    <?php
                    }
                    ?>
                    </select></td>
                </tr>
                <tr>
                    <td><input type="text" name="sclass" placeholder="Student Class"></td>
              </tr> 
              <tr>
                <td><input type="number" name="sroll1" placeholder="Student Marks"></td>
          </tr> 
              <tr>
                <td colspan="2"><input type="submit" name="submit2" value="Add" ></td>
              </tr>  
        </table>
<h1><center>DataBase</center></h1>
        <table id="t2" border="1"rules="all">
            <tr>
            <th>Student ID</th>
            <th>Student Roll No</th>
            <th>Student Class</th>
            <th>Student Marks</th>
            </tr>
            <?php
                    $sql3="select * from marks";
                    $rs3=mysqli_query($con,$sql3);
                    while($rw3=mysqli_fetch_row($rs3))
                    {
                    ?>
                    <tr>
                        <td><?php echo $rw3[0];?></td>
                        <td><?php echo $rw3[1];?></td>
                        <td><?php echo $rw3[2];?></td>
                        <td><?php echo $rw3[3];?></td>
                    </tr>
                    <?php
                    }
                    ?>
        </table>
        </div>
    </form>
<h1><center>Inner Join</center></h1>
    <table id="t2" border="1"rules="all">
            <tr>
            <th>Student ID</th>
            <th>Student Roll No</th>
            <th>Student Class</th>
            <th>Student Marks</th>
            </tr>
            <?php
                    $sql6="select * from student inner join marks on student.rollno=marks.srollno";
                    $rs6=mysqli_query($con,$sql6);
                    while($rw6=mysqli_fetch_row($rs6))
                    {
                    ?>
                    <tr>
                        <td><?php echo $rw6[0];?></td>
                        <td><?php echo $rw6[1];?></td>
                        <td><?php echo $rw6[2];?></td>
                        <td><?php echo $rw6[3];?></td>
                    </tr>
                    <?php
                    }
                    ?>
                   <br><br>
            
</table>
<h1><center>Left Join</center></h1>
    <table id="t2" border="1"rules="all">
            <tr>
            <th>Student ID</th>
            <th>Student Roll No</th>
            <th>Student Class</th>
            <th>Student Marks</th>
            </tr>
            <?php
                    $sql6="select * from student left join marks on student.rollno=marks.srollno";
                    $rs6=mysqli_query($con,$sql6);
                    while($rw6=mysqli_fetch_row($rs6))
                    {
                    ?>
                    <tr>
                        <td><?php echo $rw6[0];?></td>
                        <td><?php echo $rw6[1];?></td>
                        <td><?php echo $rw6[2];?></td>
                        <td><?php echo $rw6[3];?></td>
                    </tr>
                    <?php
                    }
                    ?>
                   <br><br>
            
</table>
<h1><center>Right Join</center></h1>
    <table id="t2" border="1"rules="all">
            <tr>
            <th>Student ID</th>
            <th>Student Roll No</th>
            <th>Student Class</th>
            <th>Student Marks</th>
            </tr>
            <?php
                    $sql6="select * from student right join marks on student.rollno=marks.srollno";
                    $rs6=mysqli_query($con,$sql6);
                    while($rw6=mysqli_fetch_row($rs6))
                    {
                    ?>
                    <tr>
                        <td><?php echo $rw6[0];?></td>
                        <td><?php echo $rw6[1];?></td>
                        <td><?php echo $rw6[2];?></td>
                        <td><?php echo $rw6[3];?></td>
                    </tr>
                    <?php
                    }
                    ?>
                   <br><br>
            
</table>
<h1><center>Cross Join</center></h1>
    <table id="t2" border="1"rules="all">
            <tr>
            <th>Student ID</th>
            <th>Student Roll No</th>
            <th>Student Class</th>
            <th>Student Marks</th>
            </tr>
            <?php
                    $sql6="select * from student cross join marks on student.rollno=marks.srollno";
                    $rs6=mysqli_query($con,$sql6);
                    while($rw6=mysqli_fetch_row($rs6))
                    {
                    ?>
                    <tr>
                        <td><?php echo $rw6[0];?></td>
                        <td><?php echo $rw6[1];?></td>
                        <td><?php echo $rw6[2];?></td>
                        <td><?php echo $rw6[3];?></td>
                    </tr>
                    <?php
                    }
                    ?>
                   <br><br>
            
</table>
</body>
</html>





        
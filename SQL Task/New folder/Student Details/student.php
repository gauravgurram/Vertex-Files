<?php 
$con=mysqli_connect("localhost", "root","","foreigntask");
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $roll=$_POST['rollno'];
    $sql="insert into student(name,gender,rollno) values('$name','$gender','$roll')";
    if(mysqli_query($con,$sql))
    {
        echo "Inserted";
    }
    else
    {
        echo "Not Inserted";
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
        .main{
            margin: auto;
            width:30%;
            border-color: black;
            border-style: solid;
            margin-top: 20px;
        }
        input[type=submit]
        {
         
            margin-left: 40%;
        }

    </style>
</head>
<body>
<div class="Student">
    <form method="post">
        <div class="main"><br><br>
            Student Name : <input type="text" name="name"><br><br>
            Gender : <input type="radio" name="gender" value="Male">Male<input type="radio" name="gender" value="Female">Female<br><br>
            Student Roll No : <input type="text" name="rollno"><br><br>
            <input type="submit" name="submit" value="Submit"><br><br>
        </div>
    </form>
    </div>
<div class="marks">
    <form method="post">
        <div class="main"><br><br>
        Student Name : <select name=stdname>
                        <option>Choose the options</option>

                <?php 
                $sql="select * from student";
                $rs=mysqli_query($con,$sql);
                while($rw=mysqli_fetch_row($rs))
                {

                ?>
                        <option value="<?php echo $rw[1];?>"><?php echo $rw[1];}?></option>
                </select><br><br>
        Gender : <input type="radio" name="gender" value="Male">Male<input type="radio" name="gender" value="Female">Female<br><br>
            Student Roll No : <input type="text" name="rollno"><br><br>
            <input type="submit" name="sub" value="Submit"><br><br>
        </div>
    </form>
    </div>
</body>
</html>

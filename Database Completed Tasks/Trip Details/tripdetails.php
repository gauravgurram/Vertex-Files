<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trip Details</title>
    <style>
        .main{
            border-style: solid;
            border-color: black;
            margin: auto;
            width:30%;
            height:80%;
            text-align: center;
            border-radius: 15px;
            background-color: darkgray;
        }

        input[type=text]{
            width:auto;
            height: auto;
            margin: auto;
            border-radius: 5px;
        }
        input[type=password]{
            width:auto;
            height: auto;
            margin: auto;
            border-radius: 5px;
        }
        select{
            width:90%;
            border-color: black     ;
            height: auto;
            margin: auto;
            border-radius: 5px;
        }
        table{
            margin: auto;
            padding: 3%;
        }
        tr,td{
            padding:2%;
            width: 35%;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
        }
        h1{

            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            font-style: normal;
            text-decoration: underline;
            color:darkgreen;
        }
        input[type=submit]
        {
            border-radius:5px;
            width:30%;
            background-color: darkgreen;
            font-size: large;
            font-weight: bold;
            border-style: none;
            color: aliceblue;
            height: 40px;
        }
    </style>
</head>
<body>
    <form method="post">
        <div class="main">
            <h1>Trip Details</h1>
            <table>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td>Destination</td>
                    <td><input type="text" name="dest"></td>
                </tr>
                <tr>
                    <td>Package</td>
                    <td><input type="number" name="price"></td>
                </tr>
            </table><br>
            <input type="submit" name="btn" value="Save"><br><br>
        </div>
    </form>
</body>
</html>
<?php 
require('config.php');
if(isset($_POST['btn']))
{
$name=$_POST['name'];
$dest=$_POST['dest'];
$price=$_POST['price'];

$sql="insert into tripdetails(name,destination,package) values('$name','$dest','$price');";
if(mysqli_query($con,$sql))
{
    echo "<script>alert('Data Successfully Inserted');</script>";
    header('location:fetch.php');
}
else
{
    echo mysqli_error($con);
}
}
?>
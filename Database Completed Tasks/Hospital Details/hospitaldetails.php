<html>
    <head>
        <title>Hospital Management
</title>
<style>
    form{
        border-style: 2px solid;
        border-radius: 5px;
        border-color: brown;
        background-color: aquamarine;
        margin:auto;
        padding: auto;
        width:35%;
    }
    input[type="text"]
    {
        border-radius: 3px;
    }
    td
    {
        width: 40%;
        padding: 5%;
        text-align: center;
    }
    input[type="submit"]
    {
        margin: auto;
        border-radius: 5px;
        text-align: center;
    }

    </style>

    </head>
    <body><br>
        <h1 align='center'>Hospital Details</h1>    
    <br>
            <form method="post">
            <table>
                <tr>
                    <td>Patient Name</td>
                    <td> <input type="text" name="pname" required></td>
                </tr>
            <tr>
                <td> Gender</td>
                <td><input type="radio" name="male" value="Male" required>Male<input type="radio" name="male" value="female" required>Female</td>
            </tr>
            <tr>
                <td>Age </td>
                <td><input type="text" name="age" required></td>
            </tr>
            <tr>
                <td> Email</td>
                <td> <input type="text" name="email" required></td>
            </tr>
            <tr>
                <td>Contact No</td>
                <td><input type="text" name="contact" required></td>
            </tr>
            <tr>
                <td> Address</td>
                <td><input type="text" name="address1" required></td>
            </tr>
            <tr>
                <td>Disease</td>
                <td><input type="text" name="disease" required></td>
            </tr>
        <tr >
        <td colspan="2">
        <input type="submit" name="btn" value="Save To Database">
        </td>
    
        </tr>
            </table>
        </form>
    </body>
</html>
<?php 
require('config.php');
if(isset($_POST['btn']))
{
$name=$_POST['pname'];
$gender=$_POST['male'];
$age=$_POST['age'];
$email=$_POST['email'];
$contact=$_POST['contact'];
$address=$_POST['address1'];
$disease=$_POST['disease'];
$sql="insert into hospitaldetails(patient_name,patient_gender,patient_age,patient_email,patient_contact,patient_address,patient_disease) 
values('$name','$gender','$age','$email','$contact','$address','$disease')";
echo $sql;
if(mysqli_query($con,$sql))
{
    echo "<script>alert('Data successfully added');</script>";
    header('location:fetch.php');
}
else
{
    echo mysqli_error($con);
}
}
?>
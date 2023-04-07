<?php
require('config.php');
?>
<head>
    <title>
       Data From Database
</title>
 </head>
 <body>
 <table border='1'  align='center' style='text-align:center; width:80%; height:30%;background-color: greenyellow; color:green; margin-top:5%;'>
<tr>
<th>First Name</th>
<th>Middle Name</th>
<th>Last Name</th>
<th>Email ID</th>
<th>Phone No. </th>
<th>Address</th>
<th>Course</th>
<th>Password</th>
<th>Confirm Password</th>
<th colspan='2'>Action</th>
</tr>
<?php
$sql="select * from registration";
$rs=mysqli_query($con,$sql);
while($rw=mysqli_fetch_row($rs))
{
?>
<tr>
    <td><?php echo $rw[1];?></td>
    <td><?php echo $rw[2];?></td>
    <td><?php echo $rw[3];?></td>
    <td><?php echo $rw[4];?></td>
    <td><?php echo $rw[5];?></td>
    <td><?php echo $rw[6];?></td>
    <td><?php echo $rw[7];?></td>
    <td><?php echo $rw[8];?></td>
    <td><?php echo $rw[9];?></td>
    <td><a href='deletefromtable.php?id=<?php echo $rw[0]?>'>Delete</a></td>
    <td><a href='updatetable.php?id=<?php echo $rw[0];?>'>Update</a></td>
</tr>
<?php
}
?>
</table>
 </body>
 </head>


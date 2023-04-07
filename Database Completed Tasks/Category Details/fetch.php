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
<th>Name</th>
<th>Status</th>
<th colspan='2'>Action</th>
</tr>
<?php
$sql="select * from categorydetails";
$rs=mysqli_query($con,$sql);
while($rw=mysqli_fetch_row($rs))
{
?>
<tr>
    <td><?php echo $rw[1];?></td>
    <td><?php echo $rw[2];?></td>
    <td><a href='delete.php?id=<?php echo $rw[0]?>'>Delete</a></td>
    <td><a href='update.php?id=<?php echo $rw[0];?>'>Update</a></td>
</tr>
<?php
}
?>
</table>
 </body>
 </head>


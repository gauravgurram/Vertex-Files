<?php 
$con=mysqli_connect("localhost","root","","sqltasks");
$sql="select * from inputtags";
$rs=mysqli_query($con,$sql);
$rw=mysqli_fetch_row($rs);
?>

<head>
    <title>
       Data From Database
</title>
 </head>
 <body>
    <h1><center>Data From Database</h1>
 <table border='1'  align='center' style='text-align:center; width:80%; height:30%;background-color: white; color:green; margin-top:5%;'>
<tr>
<th>Button</th>
<th>Checkbox</th>
<th>Color</th>
<th>Date</th>
<th>Date time</th>
<th>Date Time Local</th>
<th>Email</th>
<th>File</th>
<th>Hidden</th>
<th>Image</th>
<th>Month</th>
<th>Number</th>
<th>Password</th>
<th>Radio</th>
<th>Range</th>
<th>Reset</th>
<th>Search</th>
<th>Submit</th>
<th>Tel</th>
<th>Text</th>
<th>Time</th>
<th>URL</th>
<th>Week</th>
</tr>
<?php
$sql="select * from inputtags";
$rs=mysqli_query($con,$sql);
$rw=mysqli_fetch_row($rs);
while($rw=mysqli_fetch_row($rs))
{
?>
<tr>
    
<?php
 for($i=0;$i<count($rw);$i++)
 {
    echo "<td>$rw[$i]</td>";
 }

?>
</tr>
<?php
}
?>
</tr>
</table>
 </body>
 </head>


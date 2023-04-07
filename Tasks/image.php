<?php 
echo "<table border='1'>";
for ($i=1;$i<=10;$i++)
{
    echo "<tr><td width='200px'><center>$i</td><td><img src='$i.png' width='300px' height='300px'></td></tr>";
    echo "<br>";
}
echo "</table>";
?>
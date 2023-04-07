<?php 
$n1=2;
$n2=3;
$n3=4;
echo "<table border='1' rules='all' bgcolor='pink'>";
for ($i=1;$i<=10;$i++)
{
    echo "<tr><td>$n1 x $i =".$n1*$i. "</td><td>$n2 x $i =".$n1*$i. "</td><td>$n3 x $i =".$n1*$i. "</td></tr>";
}
echo "</table>";

?>
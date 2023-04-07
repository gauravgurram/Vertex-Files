<?php 

echo "Alphabets from A-Z <ul type=square>";
echo "<table border='1'align='center'>";
for ($i=65;$i<91;$i++)
{
    echo "<tr><td><li>".chr($i)."</i></td></tr>";
}
echo "</ul>";
echo "</table>";
echo "<table border='1' align='center'>";
echo "<br>";
echo "Alphabets from a-z <ul type=disc>";
for ($i=97;$i<123;$i++)
{
    echo "<tr><td><li>".chr($i)."</i></td></tr>";
}
echo "</table>";
echo "</ul>";
?>
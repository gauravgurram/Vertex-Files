<?php
$no=10;
    echo "<br>";
    echo "<table border='1' rules='all' align='center' bgcolor='red' style='text-align:center ;color:white; height:50px;'><tr align='center'><th width='200px'>Numbers</th><th width='200px'>Square</th><th width='200px'>Cube</th></tr></table>";
    for ($i=1;$i<=$no;$i++)
    {
        echo "<table border='1' rules='all' align='center' bgcolor='orange'  style='text-align:center ; height:50px;' ><tr align='center'><td width='200px'>".$i."</td><td width='200px'>".($i*$i)."</td><td width='200px'>".($i*$i*$i)."</td></tr></table>";
    }
?>
<?php
   $no=10;
   echo "<br>";
   echo "<table border='1' rules='all' align='center' bgcolor='green' style='text-align:center ; height:50px;'><tr align='center'><th width='200px'>Numbers</th><th width='200px'>Square Root</th><th width='200px'>Cube Root</th></tr></table>";
   for ($i=1;$i<=$no;$i++)
    {
      echo "<table border='1' rules='all' align='center' bgcolor='lightgreen'  style='text-align:center ; height:50px;' ><tr align='center'><td width='200px'>".$i."</td><td width='200px'>".sqrt($i)."</td><td width='200px'>".$i**(1/3)."</td></tr></table>";
    }
?>
<?php
   echo " <style>
        td, th 
        {  
            border: 1px solid #000000;         
        } 
        table:nth-child(even) 
        {  
           background-color:  #E2D1F9;  
         }  
         table:nth-child(odd) 
        {  
           background-color: #317773;  
         }  
    </style>";

       $t1=2;
      $t2=3;
     $t3=4;
   echo "<br>";

  echo "<table border='1' rules='all' align='center' style='text-align:center ; height:50px; font-size:30px; '><tr align='center'><th width='607px'>Multiplication Table</th></tr></table>";
    for ($i=1;$i<=10;$i++)
    {
        echo "<table class='table1' border='1' rules='all' align='center' style='text-align:center ; height:50px; font-weight:bold ;' ><tr align='center'><td width='200px' >".$t1." x ".$i."=".($t1*$i)."</td><td width='200px'>".$t2." x ".$i."=".($t2*$i)."</td><td width='200px'>".$t3." x ".$i."=".($t3*$i)."</td></tr></table>";
    }
?>
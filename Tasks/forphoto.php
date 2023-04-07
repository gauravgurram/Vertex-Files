<?php
$arr=array(["<img src='a.png' width=100px;height=100px;>","<img src='b.png' width=100px;height=100px;>","<img src='c.png' width=100px;height=100px;>"],["<img src='d.png' width=100px;height=100px;>","<img src='e.png' width=100px;height=100px;>","<img src='f.png' width=100px;height=100px;>"],["<img src='g.png' width=100px;height=100px;>","<img src='h.png' width=100px;height=100px;>","<img src='i.png' width=100px;height=100px;>"]);
for ($i=0;$i<count($arr);$i++)
{
    for ($j=0;$j<count($arr);$j++)
    {
        echo " ".$arr[$i][$j];
    }
    echo "<br>";
}
?>
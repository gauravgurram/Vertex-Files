<?php

$sub_1 = 95;
$sub_2 = 85;
$sub_3 = 74;
$sub_4 = 64;
$sub_5 = 53;


$total = $sub_1 + $sub_2 + $sub_3 + $sub_4 + $sub_5;
$average = $total / 5.0;
$percentage = ($total / 500.0) * 100;


$sAvg = (int) ($average / 10);


switch ($sAvg) {
    case 10:
        $grade = 'First Class';
        break;

    case 9:
        $grade = 'Distinction';
        break;

    case 8:
        $grade = 'Second class';
        break;

    case 7:
        $grade = 'Third class';
        break;

    case 6:
        $grade = 'Pass';
        break;

    default:
        $grade = 'Fail';
        break;
}


echo "The Total marks   = " . $total . "/500\n";
echo "The Average marks = " . $average . "\n";
echo "The Percentage    = " . $percentage . "%\n";
echo "The Grade         = '" . $grade . "'\n";

?>
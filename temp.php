<?php

$arr = array();  // loosely typed ,even if it is not declared as array, it automatically figure out.
// for($i=0;$i<=10;$i++) {
//     $val = array();
//     for($j=0;$j<=10;$j++) {
//        array_push($val,($i)*11 + $j);
//     }
//     array_push($arr,$val);
// }

// for($i=0;$i<=10;$i++) {
//     for($j=0;$j<=10;$j++) {
//         $arr[$i][$j] = ($i)*11 + $j;
//     }
// }

for($i=0;$i<=10;$i++) {
    for($j=0;$j<=10;$j++) {
        echo $arr[$i][$j] . " ";
    }
    echo "\n";
}

?>
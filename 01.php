<?php
$a = 0;
do {
    if ($a == 0) {
        echo $a . " - это ноль<br>";
    } elseif ($a % 2) {
        echo $a . " - нечетное число<br>";
    } else {
        echo $a . " - четное число<br>";
    }
    $a = $a + 1;
} while ($a <= 10);
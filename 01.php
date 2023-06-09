<?php
function first_task($a, $b)
{
    if ($a >= 0 && $b >= 0)
        return $a - $b;
    elseif ($a < 0 && $b < 0)
        return $a * $b;
    else
        return $a + $b;
}
?>
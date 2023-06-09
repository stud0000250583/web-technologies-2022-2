<?php
    function power($val, $pow) {
        if ($pow < 0) {
            echo "Use sqrt() function instead";
            return null;
        }
        if ($pow == 0)
            return 1;
        else
            return power($val, $pow - 1) * $val;
    }
?>
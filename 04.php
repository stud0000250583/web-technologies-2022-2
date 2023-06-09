<?php 
    require '03.php';

    function math_operation($arg1, $arg2, $operation) {
        switch ($operation) {
            case "add":
                return add($arg1, $arg2);
                break;
            case "sub":
                return sub($arg1, $arg2);
                break;
            case "mul":
                return mul($arg1, $arg2);
                break;
            case "div":
                return div($arg1, $arg2);
                break;
            default:
                echo "Unknown operation";
        }
    }
?>
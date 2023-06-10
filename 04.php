<?php
require '03.php';

function math_operation($arg1, $arg2, $operation)
{
    switch ($operation) {
        case "add":
            return add($arg1, $arg2);
        case "sub":
            return sub($arg1, $arg2);
        case "mul":
            return mul($arg1, $arg2);
        case "div":
            return div($arg1, $arg2);
        default:
            echo "Unknown operation";
    }
}
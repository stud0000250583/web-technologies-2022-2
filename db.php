<?php require 'config.php';
function get_db()
{
    static $db = null;
    if (is_null($db)) {
        $db = @mysqli_connect(HOST, USER, PASS, DB) or die("Could not connect: " . mysqli_connect_error());
    }
    return $db;
}

function get_assoc_result($sql)
{
    $result = @mysqli_query(get_db(), $sql) or die(mysqli_error(get_db()));
    $array_result = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $array_result[] = $row;
    }
    return $array_result;
}
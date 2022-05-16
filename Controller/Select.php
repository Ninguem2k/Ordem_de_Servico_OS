<?php
require_once __DIR__ . "/../Model/PDO_SELECT.php";

function SELECT($table, $col, $posit) {
    $S = new PDO_SELECT();
    return $S->SELECT($table, $col, $posit);
}

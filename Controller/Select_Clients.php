<?php

session_start();
require_once __DIR__ . "/../Model/PDO_SELECT.php";
$POST = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (isset($POST ['ID_CLIENT'])) {
    Cad_OS($POST ['ID_CLIENT']);
}

function Cad_OS($ID_CLIENT) {
    if (mysqli_num_rows(VFclient($ID_CLIENT)) > 0) {
        $S = new PDO_SELECT();
        $table = 'os';
        $cols = array(
            "ID_client" => "$ID_CLIENT",
        );
        $ID_os = $S->Insert($table, $cols);
        $_SESSION['ID_OS'] = $ID_os;
        header("location: ../../View/Cadastro_OS.php");
    }
}

function VFclient($ID_CLIENT) {
    $table = 'clientes';
    $col = 'CODIGO';
    $S = new PDO_SELECT();
    return $S->SELECT($table, $col, $ID_CLIENT);
}

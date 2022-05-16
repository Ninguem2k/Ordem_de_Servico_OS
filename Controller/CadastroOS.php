<?php

require_once __DIR__ . "/../Model/PDO_OS_cadastro.php";
$POST = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($POST)) {
    UPdat_OS($POST);
}

function UPdat_OS($POST) {
    $S = new PDO_OS_cadastro();
    if ( $S->Cadastro_OS($POST)) {
        header("location: ../../View/Listar_OS.php");
    }
}
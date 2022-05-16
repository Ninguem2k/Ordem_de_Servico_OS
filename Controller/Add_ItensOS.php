<?php

require_once __DIR__ . "/../Model/PDO_OS_itens.php";
//faz o parsing na string, gerando um objeto PHP
$data[] = json_decode(file_get_contents("php://input"));
Add_OS_itens($data);
function Add_OS_itens($data) {
    $Iten = new PDO_OS_itens();
    $table = 'os_itens';

    for ($i = 0; $i < count($data[0]); $i++) {
        foreach ($data[0][$i] as $key => $value) {
            $array [$key] = $value;
        }
        $Iten->Addosintes($table, $array);
    }
}

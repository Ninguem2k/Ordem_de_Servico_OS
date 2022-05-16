<?php
require_once __DIR__ . "/../Model/PDO_SELECT.php";
$GUET = filter_input_array(INPUT_GET, FILTER_DEFAULT);
$table = $GUET['table'];
$cols = $GUET['cols'];
$posit = $GUET['posit'];
Delet($table, $cols, $posit);

function Delet($table, $cols, $posit) {
    $S = new PDO_SELECT();
    if ($S->Delete($table, $cols, $posit) != 0) {
        echo "
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../View/Listar_OS.php'>
            <script type=\"text/javascript\">
            alert(\" Apagado com Sucesso.\");
            </script>";
    } else {
        echo "META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../View/Listar_OS.php'>
             <script type=\"text/javascript\">
             alert(\"Não foi Apagado.\");
              </script>";
    }
}

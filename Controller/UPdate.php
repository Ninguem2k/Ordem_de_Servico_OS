<?PHP
require_once __DIR__ . "/../Model/PDO_SELECT.php";
$POST = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (isset($POST ['ID'])) {
    UPdat($POST);
}

function UPdat($POST) {

        $S = new PDO_SELECT();
        $table = 'os';
        $cols = array(
            "ID_client" => "$ID_CLIENT",
        );
        $posit ='';
         $S->UPdate($table, $cols,$posit);
        header("location: http://localhost/7System/View/Cadastro_OS/Cadastro_OS.php");
}

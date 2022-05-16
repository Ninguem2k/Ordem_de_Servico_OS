<?php

require_once __DIR__ . "/connect/Connection.php";

class PDO_LOGIN {

    private $conexao;

    public function __construct() {

        $connection = new Connection();
        $conn = $connection->openConnection(); 
        $this->conexao = $conn;
    }

    public function login($name, $password) {
        $conn = $this->conexao;
        $senha = $password;
        $smt = ("SELECT * FROM `vendedor` WHERE `Nome` = '$name' AND Senha ='$senha'");
        $row = mysqli_query($conn, $smt);
        if ($row) {
            session_start();
            foreach ($row as $ID) {
                $_SESSION['ID_USER_SESSION'] = $ID['CODIGO'];
            }
            return true;
        } else {
            return false;
        }
    }

}

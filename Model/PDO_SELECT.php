<?php

require_once __DIR__ . "/connect/Connection.php";

class PDO_SELECT {

    private $conexao;

    public function __construct() {

        $connection = new Connection();
        $conn = $connection->openConnection();
        $this->conexao = $conn;
    }

    public function SELECT($table, $col, $posit) {
        $conn = $this->conexao;
        if ($posit === '') {
            $smt = ("SELECT * FROM $table ");
        } else {
            $smt = ("SELECT * FROM $table WHERE $col = $posit ");
        }

        $row = mysqli_query($conn, $smt);
        return $row;
    }


    public function Insert($table, $cols) {
        $conn = $this->conexao;
        foreach ($cols as $key => $value) {
            $smt = ("INSERT INTO $table ($key)VALUES ('$value') ");
        }
        mysqli_query($conn, $smt);
        return mysqli_insert_id($conn);
    }

    public function Delete($table, $cols, $posit) {
        $conn = $this->conexao;
        $smt = ("DELETE FROM $table WHERE $cols = $posit");
        mysqli_query($conn, $smt);
        return mysqli_affected_rows($conn);
    }

    public function Addosintes($table, $cols) {
        $conn = $this->conexao;
        $smt = ("INSERT INTO $table (Codigo,Quantidade,Valor)VALUES ( '$cols[0]','$cols[1]','$cols[2]') ");
        mysqli_query($conn, $smt);
        return mysqli_insert_id($conn);
    }

}

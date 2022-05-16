<?php

require_once __DIR__ . "/connect/Connection.php";

class PDO_OS_itens {

    private $conexao;

    public function __construct() {
        $connection = new Connection();
        $conn = $connection->openConnection();
        $this->conexao = $conn;
    }

    public function Addosintes($table, $cols) {
        $conn = $this->conexao;
        $Codigo = $cols['Codigo'];
        $Name = $cols['Name'];
        $Quantidade = $cols['Quantidade'];
        $Valor = $cols['Valor'];
        $ID_OS = $cols['ID_OS'];
        $smt = ("INSERT INTO $table (Codigo,Nome,Quantidade,Valor,ID_OS)VALUES ( '$Codigo','$Name','$Quantidade','$Valor','$ID_OS') ");
        mysqli_query($conn, $smt);
    }

    public function Remosintes($table, $cols) {
        $conn = $this->conexao;
        $Codigo = $cols['Codigo'];
        $Name = $cols['Name'];
        $Quantidade = $cols['Quantidade'];
        $Valor = $cols['Valor'];
        $ID_OS = $cols['ID_OS'];
        $OPcao = $cols['OPcao'];
        if($OPcao =='Inserir') {
            $smt = ("INSERT INTO $table (Codigo,Nome,Quantidade,Valor,ID_OS)VALUES ( '$Codigo','$Name','$Quantidade','$Valor','$ID_OS') ");
        } else if($OPcao =='Alterar') {
            $smt = ("UPDATE $table SET Nome='$Name',Quantidade='$Quantidade',Valor='$Valor' WHERE '$ID_OS' = ID_OS && Codigo='$Codigo' )VALUES ( ,'$Name','$Quantidade','$Valor','$ID_OS') ");
        } else if($OPcao =='Deletar') {
            $smt = ("DELETE $table SET Codigo WHERE '$ID_OS' = ID_OS && Codigo='$Codigo' ");
        }

        mysqli_query($conn, $smt);
    }

//    public function Addestoque($table, $cols) {
//        $conn = $this->conexao;
//        $smt = ("INSERT INTO $table ($cols)VALUES ( '$cols[0]','$cols[1]','$cols[2]','$ID_OS') ");
//        mysqli_query($conn, $smt);
//        return mysqli_insert_id($conn);
//    }
//
//    public function Subtraiestoque($table, $cols) {
//        $conn = $this->conexao;
//        $smt = ("INSERT INTO $table ($cols)VALUES ( '$cols[0]','$cols[1]','$cols[2]') ");
//        mysqli_query($conn, $smt);
//        return mysqli_insert_id($conn);
//    }
}

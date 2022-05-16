<?php

require_once __DIR__ . "/connect/Connection.php";

class PDO_OS_cadastro {

    private $conexao;

    public function __construct() {
        $connection = new Connection();
        $conn = $connection->openConnection();
        $this->conexao = $conn;
    }

    public function Cadastro_OS( $cols) {
        $conn = $this->conexao;
        $ID_OS = $cols['ID_OS'];
        $ID_client = $cols['ID_Client'];
        $Nome_client = $cols['Nome_client'];
        $Modelo = $cols['Modelo'];
        $Detalhe = $cols['Detalhe'];
        $Reclamacao = $cols['Reclamacao'];
        $Desconto = $cols['Desconto'];
        $Atendente = $cols['Atendente'];
        $Obs = $cols['Obs'];
        $Date_OS = $cols['Date_OS'];
        $Valor_Total = $cols['Valor_total'];
        
//        echo 'ID_client = '.$ID_client.',Nome_client = '.$Nome_client.',Modelo = '.$Modelo.',Detalhe = '.$Detalhe.',Reclamacao = '.$Reclamacao.', Desconto = '.$Desconto.',Atendente = '.$Atendente.',Obs = '.$Obs.', Date_OS = '.$Date_OS.' , Valor_Total = '.$Valor_Total.'  WHERE ID_OS = '.$ID_OS.' ';
        $smt = ("UPDATE os SET ID_client = '$ID_client',Nome_client = '$Nome_client',Modelo = '$Modelo',Detalhe = '$Detalhe',Reclamacao = '$Reclamacao', Desconto = '$Desconto',Atendente = '$Atendente',Obs = '$Obs', Date_OS = '$Date_OS' , Valor_Total = '$Valor_Total'  WHERE ID_OS = '$ID_OS' ");
        return mysqli_query($conn, $smt);
    }

}

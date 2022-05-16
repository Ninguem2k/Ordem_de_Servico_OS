<?php

class Connection {

    private $host = "127.0.0.1";
    private $db = "";
    private $user = "";
    private $password = "";
    private $conexao;

    public function openConnection() {
        if (isset($this->conexao)) {
            return $this->conexao;
        } else {
            $this->conexao = mysqli_connect($this->host, $this->user, $this->password,  $this->db);
            return $this->conexao;
        }
    }

    public function closeConnection() {
        if ($this->conexao != null) {
            $this->conexao = null;
        }
    }

}


<?php
$u = new PDO_login();
$POST = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$name = $POST[name];
$password = $POST[$password];
if (!empty($name) && !empty($password)) {
    if ($u->msgErro == "") {
        if ($u->login($name, $password)) {
            print "<script>setTimeout(\"location.href='../Front-end/index.php'\", 10);</script>";
        } else {
            echo ' <script>alert("Gmail e/ou senha estão incorretos OU usuario não cadastrado!")</script> ';
            print "<script>setTimeout(\"location.href='PG_LOGIN.php'\", 10);</script>";
        }
    } else {
        echo "ERRO:" . $u->msgErro;
    }
} else {
    echo '<script>alert("Prencha todos os campus!")</script>';
    print "<script>setTimeout(\"location.href='PG_LOGIN.php'\", 10);</script>";
}
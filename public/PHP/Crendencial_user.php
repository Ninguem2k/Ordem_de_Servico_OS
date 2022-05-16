<?PHP

include '../connect/connection.php';
session_start();
if (!isset($_SESSION['ID'])) {
    echo '<script>alert("VÔCE DEVE LOGAR")</script>';
    print "<script>setTimeout(\"location.href='../View/Login/login.php'\", 10);</script>";
    EXIT;
} 

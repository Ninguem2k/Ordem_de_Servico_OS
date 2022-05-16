0
<?php
session_start();
$token = md5($_SESSION['id']);
if (isset($_GET['token']) && $_GET['token'] === $token) {
    session_destroy();
    header("location: ../../index.php");
    exit();
} else {
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>SAIR</title>
        </head>
        <body>       
            <?php echo'<a href="logout.php?token=' . $token . '"><input type="submit" value="Confimar saida" /></a>'; ?>
        </body>
    </html>
    <?php
}
?>



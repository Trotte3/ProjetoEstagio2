<?php 
session_start();
include ('Database.php');

if (empty($_POST['usuario']) || empty($_POST['senha'])) {
     header('Location: pagina-login.php');
     exit();
}

$usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);

$query = "SELECT usuario_id, usuario FROM usuario WHERE usuario = '$usuario' AND senha = md5('$senha')";


$result = mysqli_query($conn, $query);

if ($result === false) {
    die("Erro na query: " . mysqli_error($conn));
}

$row = mysqli_num_rows($result);


$row = mysqli_num_rows($result);

if($row == 1) {
    $_SESSION['usuario']  = $usuario;
    header('Location: index.php'); 
    exit();
}else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: Pagina-login.php');
    exit();
}

?>
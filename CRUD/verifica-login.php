<?php


if (!isset($_SESSION['usuario'])) {
    header('Location: pagina-login.php');
    exit();
}

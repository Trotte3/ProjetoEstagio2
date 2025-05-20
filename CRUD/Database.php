<?php

$servername = "localhost";    //=> Nome do Server (IP, Link ou Localhost)
$dbname     = "projetoestag";      //=> Nome do Banco de Dados
$username   = "root";     //=> Nome do Usuário do Banco de Dados
$password   = ""; //=> Senha do Usuário do Banco de Dados

$conn = new mysqli($servername, $username, $password, $dbname); //=> Cria o Objeto de Conexão
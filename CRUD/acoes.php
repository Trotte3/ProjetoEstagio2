<?php
session_start();
require 'Database.php';

if (isset($_POST['create_produto'])) {

    $Nome = mysqli_real_escape_string($conn, trim($_POST['Nome']));
    $Descricao = mysqli_real_escape_string($conn, trim($_POST['Descricao']));
    $Valor = mysqli_real_escape_string($conn, trim($_POST['Valor']));
    $Quantidade = mysqli_real_escape_string($conn, trim($_POST['Quantidade'])); 
    $Status = mysqli_real_escape_string($conn, trim($_POST['Status']));

    $sql = "INSERT INTO produto (Nome, Descricao, Valor, Quantidade, Status)
            VALUES ('$Nome', '$Descricao', '$Valor', '$Quantidade', '$Status')";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['mensagem'] = 'Produto criado com sucesso';
    } else {
        $_SESSION['mensagem'] = 'Produto não foi criado: ' . mysqli_error($conn);
    }
    header('Location: index.php');
    exit;
}

if (isset($_POST['update_produto'])) {
    $produto_id = intval($_POST['produto_id']);
    $Nome = mysqli_real_escape_string($conn, trim($_POST['Nome']));
    $Descricao = mysqli_real_escape_string($conn, trim($_POST['Descricao']));
    $Valor = mysqli_real_escape_string($conn, trim($_POST['Valor']));
    $Quantidade = mysqli_real_escape_string($conn, trim($_POST['Quantidade']));
    $Status = mysqli_real_escape_string($conn, trim($_POST['Status']));

    $sql = "UPDATE produto 
            SET Nome = '$Nome', Descricao = '$Descricao', Valor = '$Valor', Quantidade = '$Quantidade', Status = '$Status' 
            WHERE id = '$produto_id'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['mensagem'] = 'Produto atualizado com sucesso';
    } else {
        $_SESSION['mensagem'] = 'Produto não foi atualizado: ' . mysqli_error($conn);
    }
    header('Location: index.php');
    exit;
}

if (isset($_POST['delete_produto'])) {
    $produto_id = intval($_POST['delete_produto']);

    $query = "SELECT Status, Quantidade FROM produto WHERE id = '$produto_id'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $produto = mysqli_fetch_assoc($result);
        $status = strtolower(trim($produto['Status']));
        $quantidade = intval($produto['Quantidade']);

        if ($status === 'ativo') {
            $_SESSION['mensagem'] = 'Erro: Produtos com status "Ativo" não podem ser excluídos.';
        } elseif ($status === 'inativo' && $quantidade > 0) {
            $_SESSION['mensagem'] = 'Erro: Produto com quantidade maior que zero não pode ser excluído.';
        } else {
            $sql = "DELETE FROM produto WHERE id = '$produto_id'";
            if (mysqli_query($conn, $sql)) {
                $_SESSION['mensagem'] = 'Produto deletado com sucesso';
            } else {
                $_SESSION['mensagem'] = 'Erro ao deletar o produto: ' . mysqli_error($conn);
            }
        }
    } else {
        $_SESSION['mensagem'] = 'Produto não encontrado.';
    }

    header('Location: index.php');
    exit;
}


?>
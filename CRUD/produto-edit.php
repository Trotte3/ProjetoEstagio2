<?php 
session_start();
require 'Database.php';
?>

<!doctype html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>produto - Editar</title>
    <script src="https://kit.fontawesome.com/9e42919137.js" crossorigin="anonymous"></script>
    <!-- para usar os icones -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>
    <?php include('navbar.php');
    ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar Produto
                            <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php 
                        if (isset($_GET['id'])){
                            $produto_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $sql = "SELECT * FROM produto WHERE id='$produto_id'";
                            $query = mysqli_query($conn, $sql);
                            
                            if (mysqli_num_rows($query) > 0) {
                                $produto = mysqli_fetch_array($query);

                        ?>
                        <form action="acoes.php" method="POST">
                            <input type="hidden" name="produto_id" value="<?=$produto['id']?>">
                            <div class="mb-3">
                                <label>Nome</label>
                                <input type="text" name="Nome" value="<?=$produto['Nome']?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Descricao</label>
                                <input type="text" name="Descricao" value="<?=$produto['Descricao']?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Valor</label>
                                <input type="number" name="Valor" step="0.01" value="<?=$produto['Valor']?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Quantidade</label>
                                <input type="number" name="Quantidade" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Status</label>
                            <select name="Status" class="form-select" required>
                                    <option value="ativo" <?= $produto['Status'] === 'ativo' ? 'selected' : '' ?>>Ativo</option>
                                    <option value="inativo" <?= $produto['Status'] === 'inativo' ? 'selected' : '' ?>>Inativo</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="update_produto" class="btn btn-primary">Salvar</button>

                            </div> 
                        </form>
                        <?php
                        } else {
                            echo"<h5>Produto não encontrado</h5>";

                        }
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

</body>

</html>
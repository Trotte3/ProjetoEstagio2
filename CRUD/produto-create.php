<!doctype html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produtos</title>
    <script src="https://kit.fontawesome.com/9e42919137.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>
    <?php 
        include('navbar.php');
        include('Database.php');
    ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Adicionar Produto
                            <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="acoes.php" method="POST">
                            <div class="mb-3">
                                <label for="Nome" class="form-label">Nome</label>
                                <input type="text" id="Nome" name="Nome" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="Descricao" class="form-label">Descrição</label>
                                <input type="text" id="Descricao" name="Descricao" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label for="Valor" class="form-label">Valor</label>
                                <input type="number" id="Valor" name="Valor" step="0.01" class="form-control" value="0.00" required>
                            </div>
                            <div class="mb-3">
                                <label for="Quantidade" class="form-label">Quantidade</label>
                                <input type="number" id="Quantidade" name="Quantidade" step="1" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="Status" class="form-label">Status</label>
                                <select id="Status" name="Status" class="form-select" required>
                                    <option value="ativo">Ativo</option>
                                    <option value="inativo">Inativo</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="create_produto" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

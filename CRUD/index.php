<?php 
session_start();
include ('verifica-login.php');
?>
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
    <?php include('navbar.php'); include('Database.php'); ?>
    <h2><a href="logout.php" class="btn btn-primary float-end">
        <i class="fa-solid fa-right-to-bracket"></i>&nbsp;Sair</a></h2>

    <div class="container mt-4">
        <?php include('mensagem.php'); ?>
        <h2>Olá, <?php echo $_SESSION['usuario']; ?></h2>

        <form method="GET" action="">
            <input type="text" name="nome" placeholder="Buscar por nome" value="<?= $_GET['nome'] ?? '' ?>">
            <select name="status">
                <option value="">Todos os status</option>
                <option value="ativo" <?= ($_GET['status'] ?? '') == 'ativo' ? 'selected' : '' ?>>Ativo</option>
                <option value="inativo" <?= ($_GET['status'] ?? '') == 'inativo' ? 'selected' : '' ?>>Inativo</option>
            </select>
            <button type="submit" class="btn btn-secondary btn-sm">Filtrar</button>
            <h1></h1>
        </form>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Lista de Produtos
                            <a href="produto-create.php" class="btn btn-primary float-end">
                                <i class="fa-solid fa-plus"></i>&nbsp;Adicionar Produtos
                            </a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>Valor (R$)</th>
                                    <th>Quantidade</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $nome = $_GET['nome'] ?? '';
                                    $status = $_GET['status'] ?? '';
                                    $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
                                    $itens_por_pagina = 5;
                                    $offset = ($pagina - 1) * $itens_por_pagina;

                                    $condicoes = [];
                                    if ($nome != '') {
                                        $condicoes[] = "Nome LIKE '%" . mysqli_real_escape_string($conn, $nome) . "%'";
                                    }
                                    if ($status != '') {
                                        $condicoes[] = "Status = '" . mysqli_real_escape_string($conn, $status) . "'";
                                    }

                                    $where = count($condicoes) ? 'WHERE ' . implode(' AND ', $condicoes) : '';

                                    // Total de registros
                                    $sql_total = "SELECT COUNT(*) as total FROM produto $where";
                                    $result_total = mysqli_query($conn, $sql_total);
                                    $total = mysqli_fetch_assoc($result_total)['total'];
                                    $total_paginas = ceil($total / $itens_por_pagina);

                                    // Consulta paginada
                                    $sql = "SELECT * FROM produto $where LIMIT $itens_por_pagina OFFSET $offset";
                                    $produtos = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($produtos) > 0) {
                                        while ($produto = mysqli_fetch_assoc($produtos)) {
                                ?>
                                <tr>
                                    <td><?= $produto["id"] ?></td>
                                    <td><?= $produto["Nome"] ?></td>
                                    <td><?= $produto["Descricao"] ?></td>
                                    <td><?= $produto["Valor"] ?></td>
                                    <td><?= $produto["Quantidade"] ?></td>
                                    <td><?= $produto["Status"] ?></td>
                                    <td>
                                        <a href="produto-view.php?id=<?= $produto['id'] ?>" class="btn btn-secondary btn-sm">
                                            <i class="fa-solid fa-eye"></i>&nbsp;Visualizar
                                        </a>
                                        <a href="produto-edit.php?id=<?= $produto['id'] ?>" class="btn btn-success btn-sm">
                                            <i class="fa-solid fa-pen-fancy"></i>&nbsp;Editar
                                        </a>
                                        <form action="acoes.php" method="POST" class="d-inline">
                                            <input type="hidden" name="produto_id" value="<?= $produto['id'] ?>">
                                            <button onclick="return confirm('Tem certeza que deseja excluir?')" 
                                                    type="submit" name="delete_produto" value="<?= $produto['id'] ?>" 
                                                    class="btn btn-danger btn-sm">
                                                <i class="fa-solid fa-trash"></i>&nbsp;Excluir
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                        }
                                    } else {
                                        echo '<tr><td colspan="7">Nenhum produto encontrado</td></tr>';
                                    }
                                ?>
                            </tbody>
                        </table>

                        <!-- Paginação -->
                        <nav>
                            <ul class="pagination justify-content-center">
                                <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                                    <li class="page-item <?= ($i == $pagina) ? 'active' : '' ?>">
                                        <a class="page-link" href="?pagina=<?= $i ?>&nome=<?= urlencode($nome) ?>&status=<?= urlencode($status) ?>">
                                            <?= $i ?>
                                        </a>
                                    </li>
                                <?php endfor; ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>
</body>

</html>
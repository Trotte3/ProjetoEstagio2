<?php 
require 'Database.php';
?>
<!doctype html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produto - Visualizar</title>
    <script src="https://kit.fontawesome.com/9e42919137.js" crossorigin="anonymous"></script>
    <!-- para usar os icones -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>
    <?php include('navbar.php');
    include('Database.php');
    ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Visualizar produto
                            <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php 
                        if (isset($_GET['id'])){
                            $produto_id = mysqli_real_escape_string($conn, $_GET ['id']);
                            $sql = "SELECT * FROM produto WHERE id='$produto_id'";
                            $query = mysqli_query($conn,$sql);

                            if (mysqli_num_rows($query) > 0){
                                $produto = mysqli_fetch_array($query);
                        ?>
                            <div class="mb-3">
                                <label>Codigo</label>
                               <p class="form-control">
                                <?=$produto['id'];?>
                               </p>
                            </div>
                            <div class="mb-3">
                                <label>Nome</label>
                               <p class="form-control">
                                <?=$produto['Nome'];?>
                               </p>
                            </div>
                            <div class="mb-3">
                                <label>Descricao</label>
                               <p class="form-control">
                                <?=$produto['Descricao'];?>
                               </p>
                            </div>
                            <div class="mb-3">
                                <label>Valor</label>
                               <p class="form-control">
                                <?=$produto['Valor'];?>
                               </p>
                            </div>
                            <div class="mb-3">
                                <label>Quantidade</label>
                               <p class="form-control">
                                <?=$produto['Quantidade'];?>
                               </p>
                            </div>
                            <div class="mb-3">
                                <label>Status</label>
                               <p class="form-control">
                                <?=$produto['Status'];?>
                               </p>
                            </div>
                            <?php 
                           }else {
                            echo "<h5>Produto não encontrado</h5>";
                           }
                        }
                            
                            ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

</body>

</html>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9e42919137.js" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="text-center">Login</h4>
                        <?php 
                        if (isset($_SESSION['nao_autenticado'])): ?>
                        <div class="notification is danger">
                            <p>ERRO: Usuário ou senha invalidos.</p>
                        </div>
                        <?php 
                        endif;
                        unset($_SESSION['nao_autenticado']);
                        ?>
                        <form action="login.php" method="POST">
                            <div class="mb-3">
                                <label for="usuario" class="form-label">Usuário</label>
                                <input type="text" class="form-control" id="usuario" name="usuario" required>
                            </div>
                            <div class="mb-3">
                                <label for="senha" class="form-label">Senha</label>
                                <div style="display: flex;">
                                <input type="password" class="form-control" id="senha" name="senha" required style="width: 600px">
                                <button class="btn btn-link btn-sm" type="button" onclick="mostrarSenha()" value="show" class="button"><i id="eyeye" class="fa-solid fa-eye" style="color: black;"></i></button><br>
                                 <script>
                                    function mostrarSenha() {
                                        var tipo = document.getElementById("senha");
                                        var classe = document.getElementById("eyeye");

                                        if (tipo.type == "password") {
                                            tipo.type = "text";

                                            classe.className = "fa-solid fa-eye-slash"
                                        } else {
                                            tipo.type = "password";
                                            classe.className = "fa-solid fa-eye"
                                        }
                                         }
                                      </script>
                                      </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html
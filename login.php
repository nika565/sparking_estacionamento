<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="./css/style_login.css">
    
    <link rel="shortcut icon" href="logo/SPARKING.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<body>

<!--Inicio Header-->
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-danger">
      <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img width="150" src="logo/LOGOBRANCA.png" alt="Logo da Sparking"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link" aria-current="page" href="index.php">Home</a>
            <a class="nav-link" href="institucional.php">Institucional</a>
            <a class="nav-link" href="blog.php">Blog</a>
            <a class="nav-link" href="contato.php">Contato</a>
            <a id="login" class="nav-link active" href="login.php">Login</a>
          </div>
        </div>
      </div>
    </nav>
<!--Fim Header-->


    <!-- Título -->
    <div class="row m-0">
        <h1 style="color: red;" class=" mt-3 text-uppercase display-4 fw-bolder text-center">sparking</h1>
    </div>
    <!-- Fim- título -->

    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>

    <!-- Container de login -->
    <div id="container_login" class="container mx-auto d-block mt-5 mb-5">
        <div class="row mt-4">
            <h1 class="text-uppercase display-3 fw-normal text-center">login</h1>
        </div>

        <div class="row">
            <p id="aviso" class="text-center">Esta seção é exclusiva apenas para administradores e funcionários.</p>
        </div>

        <form action="php/proc_login.php" method="post" class="container mt-5">
            <div class="container">
                <label class="form-label fs-4" for="login_email">email</label>
                <input class="form-control rounded-0 border-0 border-bottom border-2 border-danger bg-white" type="email" name="login_email" id="login_email" required>
            </div>

            <div class="container mt-4 pb-3">
                <label class="form-label fs-4" for="login_senha">senha</label>
                <input class="form-control rounded-0 border-0 border-bottom border-2 border-danger bg-white" type="password" name="login_senha" id="login_senha" required>
            </div>
            
            <div class="container my-5">
                <div class="row">
                    <div class="col-md-6">
                        <a style="text-decoration: none;" href="index.php" id="botao" type="submit" class="btn btn-danger rounded-3 text-center text-uppercase mx-auto d-block container">voltar</a>
                    </div>
    
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success text-uppercase mx-auto d-block h-100 container">enviar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Fim - container de login -->
</body>
</html>
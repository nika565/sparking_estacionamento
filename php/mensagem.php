<?php
session_start();
include_once("conect.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="shortcut icon" href="../logo/SPARKING.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Feedback</title>
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-danger">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php"><img width="150" src="../logo/LOGOBRANCA.png" alt="Logo da Sparking"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="../cad_func.php">Cadastrar</a>
                    <a class="nav-link" href="lista_empregados.php">Lista de empregados</a>
                    <a class="nav-link" href="../cadastro_veiculo.php">Cadastrar veículo</a>
                    <a class="nav-link" href="../buscar_veiculo.php">Buscar veículo</a>
                    <a class="nav-link" href="relatorio.php">Relatório</a>
                    <a class="nav-link active" href="mensagem.php">Feedback</a>
                    <a class="nav-link" href="../index.php">Home</a>
                    <a id="login" class="nav-link" href="../login.php">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <h1 class="text-uppercase display-5 fw-bold pb-3">feedbacks</h1><hr>
        
        <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                echo ($_SESSION['msg']);
                unset($_SESSION['msg']);
            }

            $result_usuarios = "SELECT * FROM cliente";
            $resultado_usuarios = mysqli_query($conn, $result_usuarios);
            while ($row_usuario = mysqli_fetch_assoc($resultado_usuarios)) {
                echo "<p class='text-capitalize'><strong>nome:</strong> " . $row_usuario['nome'] . "</p>";
                echo "<p><strong>Email:</strong> " . $row_usuario['email'] . "</p>";
                echo "<p><strong>Data e hora:</strong> " . $row_usuario['data_msg'] . "</p>";
                echo "<p><strong>Mensagem:</strong> " . $row_usuario['mensagem'] . "</p><hr>";
            }
        ?>
    </div>
</body>
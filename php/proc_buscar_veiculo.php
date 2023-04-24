<?php
session_start();
include_once("conect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="shortcut icon" href="logo/SPARKING.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Buscar Veículo</title>
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
                    <?php
                        if($_SESSION['cargo'] == 'func'){
                            echo '<a class="nav-link" href="cadastro_veiculo_func.php">Cadastrar veículo</a>
                                  <a class="nav-link active" href="buscar_veiculo_func.php">Buscar veículo</a>';
                        }else{
                            echo'<a class="nav-link" aria-current="page" href="../cad_func.php">Cadastrar</a>
                                 <a class="nav-link" href="lista_empregados.php">Lista de empregados</a>
                                 <a class="nav-link" href="../cadastro_veiculo.php">Cadastrar veículo</a>
                                 <a class="nav-link active" href="../buscar_veiculo.php">Buscar veículo</a>
                                 <a class="nav-link" href="relatorio.php">Relatório</a>
                                 <a class="nav-link" href="mensagem.php">Feedback</a>';
                        }
                    ?>
                    <a class="nav-link" href="../index.php">Home</a>
                    <a id="login" class="nav-link" href="../login.php">Login</a>
                </div>
            </div>
        </div>
    </nav>
    
    
    <div class="container-fluid">
        <h1 class="text-center py-5 text-uppercase display-5 fw-bold">buscar veículo</h1>
    </div>

    <div class="container">
        <form class="input-group" action="proc_buscar_veiculo.php" method="post">
            <input class="form-control" name="placa_veiculo" type="text" oninput="this.value = this.value.toUpperCase()" placeholder="Digite a placa do veículo" minlength="7" maxlength="7" autofocus required aria-describedby="button-addon2">
            <button type="submit" class="btn btn-danger" id="button-addon2">Pesquisar</button>
        </form>
        <hr>
    </div>
        
    <div class="container">
        <?php

            $placa = filter_input(INPUT_POST, 'placa_veiculo', FILTER_SANITIZE_STRING);

            strtolower($placa);

            $mostrar_veiculo = "SELECT * FROM veiculos WHERE placa = '$placa' AND saida IS NULL ";
            $query = mysqli_query($conn, $mostrar_veiculo);

            if (mysqli_affected_rows($conn)){
                while($row_veiculo = mysqli_fetch_assoc($query)){
                echo "<p><strong>Placa:</strong> " . $row_veiculo['placa'] . "</p>";
                echo "<p class='text-capitalize'><strong>Marca:</strong> " . $row_veiculo['marca'] . "</p>";
                echo "<p class='text-capitalize'><strong>Modelo:</strong> " . $row_veiculo['modelo'] . "</p>";
                echo "<div class='row'><div class='col-lg-6 my-2'><a style='text-decoration: none;' class='container btn-success rounded-3 text-uppercase text-center py-2 float-end' href='saida_veiculo.php? placa=" . $row_veiculo['placa'] . "' >Saída</a></div>";
                echo "<div class='col-lg-6 my-2'><a style='text-decoration: none;' class='container btn-danger rounded-3 text-uppercase text-center py-2 float-end' href='../buscar_veiculo.php'>Voltar</a></div></div><hr class='bg-danger'>";
                }
                    
                }
             else {
                $_SESSION['msg'] = "<div class='row text-center m-0'><p class='display-6 mt-4' style='color:red;'>VEICULO NÃO ENCONTRADO NO ESTACIONAMENTO</p></div>";
                header('location: ../buscar_veiculo.php');
            }
        ?>
    </div>
</body>
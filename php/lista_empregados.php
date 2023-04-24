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
    <link rel="shortcut icon" href="../logo/SPARKING.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/home.css">
    <title>Lista de empregados</title>

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
                    <a class="nav-link active" href="lista_empregados.php">Lista de empregados</a>
                    <a class="nav-link" href="../cadastro_veiculo.php">Cadastrar veículo</a>
                    <a class="nav-link" href="../buscar_veiculo.php">Buscar veículo</a>
                    <a class="nav-link" href="relatorio.php">Relatório</a>
                    <a class="nav-link" href="mensagem.php">Feedback</a>
                    <a class="nav-link" href="../index.php">Home</a>
                    <a id="login" class="nav-link" href="../login.php">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <h1 class="text-uppercase display-5 fw-bold pb-3">lista de empregados</h1>

        <hr>

        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }

        $ocupacao = '';

        $result_usuario = "SELECT * FROM empregados";
        $resultado_usuario = mysqli_query($conn, $result_usuario);

        while ($row_usuario = mysqli_fetch_assoc($resultado_usuario)) {
            if ($row_usuario['cargo'] == 'adm') {
                $ocupacao = 'administrador';
            } else {
                $ocupacao = 'funcionário';
            }

            echo "<p style='color: green;' class='fs-5 fw-bold'>ID: " . $row_usuario['id_empregados'] . "</p>";
            echo "<p class='text-capitalize'><strong>nome:</strong> " . $row_usuario['nome'] . "</p>";
            echo "<p><strong>Email:</strong> " . $row_usuario['email'] . "</p>";
            echo "<p><strong>CPF:</strong> " . $row_usuario['cpf'] . "</p>";
            echo "<p class='text-capitalize'><strong>cargo:</strong> " . $ocupacao . "</p>";
            echo "<div class='row'><div class='col-lg-6 my-2'><a style='text-decoration: none;' class='container btn-success rounded-3 text-uppercase text-center py-2 float-end' href='../edit_func.php?id=" . $row_usuario['id_empregados'] . "'>editar</a></div> ";
            echo "<div class='col-lg-6 my-2'><a style='text-decoration: none;' class='container btn-danger rounded-3 text-uppercase text-center py-2 float-end' href='proc_del_func.php?id=" . $row_usuario['id_empregados'] . "'>apagar</a></div></div><hr class='bg-danger'>";
        }

        //paginação - somar a quantidade e usuários
        $result_pg = "SELECT COUNT(id_empregados) AS num_result FROM empregados";
        $resultado_pg = mysqli_query($conn, $result_pg);
        $row_pg = mysqli_fetch_assoc($resultado_pg);
        ?>
    </div>
</body>
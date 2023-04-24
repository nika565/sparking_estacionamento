<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/home.css">
  <link rel="shortcut icon" href="../logo/SPARKING.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <title>Relatório Diário</title>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

    *{
      font-family:'Roboto', sans-serif;
    }
  </style>
</head>

<body id="body">

  <!--Inicio Header-->
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
          <a class="nav-link active" href="relatorio.php">Relatório</a>
          <a class="nav-link" href="mensagem.php">Feedback</a>
          <a class="nav-link" href="../index.php">Home</a>
          <a id="login" class="nav-link" href="../login.php">Login</a>
        </div>
      </div>
    </div>
  </nav>
  <!--Fim Header-->

  <!--Listagem de veiculos-->
  
  <div class="container border border-danger mt-5">
        <!-- <div class="text-center" height="250" style="border: solid red 2px;"> -->
          <h1 class="text-center text-uppercase display-5 fw-bold mt-2">Relatório do dia</h1><hr>

          <!-- Início da exibição do relatório -->
          <?php

          date_default_timezone_set('America/Sao_Paulo');

          session_start();
          include_once("conect.php");

          $data = new DateTime();
          $data_str = $data->format('Y-m-d');
          $data_realtorio = date('d/m/Y');

          //Registrar o inicio do dia
          $inicio_dia = new DateTime($data_str . ' 00:00:00');

          //Registrar o fim do dia
          $fim_dia = new DateTime($data_str . ' 23:59:59');

          // Descobrir quantos carros entraram no estacionamento nesse dia
          $sql = "SELECT COUNT(id_veiculo) AS qtd_car FROM veiculos WHERE entrada BETWEEN '{$inicio_dia->format('Y-m-d H:i:s')}' AND '{$fim_dia->format('Y-m-d H:i:s')}'";

          $resultado = mysqli_query($conn, $sql);

          $row = mysqli_fetch_assoc($resultado);
          echo "<h3 class='text-uppercase text-center'>$data_realtorio</h3><hr>";
          echo "<li class='fs-3'>Total de carros:  " . $row['qtd_car'] . "</li>";

          $sql = "SELECT SUM(pagamento) AS pagamento FROM veiculos WHERE saida BETWEEN '{$inicio_dia->format('Y-m-d H:i:s')}' AND '{$fim_dia->format('Y-m-d H:i:s')}'";

          $resultado = mysqli_query($conn, $sql);

          $row = mysqli_fetch_assoc($resultado);

          echo "<li class='pt-2 fs-3'>Lucro total:  R$" . $row['pagamento'] . "</li><br>";
          ?>
  </div>
</body>
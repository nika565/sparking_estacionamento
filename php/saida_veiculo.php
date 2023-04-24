<?php
date_default_timezone_set('America/Sao_Paulo');

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
  <link rel="shortcut icon" href="logo/SPARKING.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <title>Saída de Veículos</title>
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
  <!--Fim Header-->

  <!--Listagem de veiculos-->

  <div class="container mt-5">

    <h1 class="text-uppercase display-5 fw-bold">nota fiscal</h1><hr>
          <?php
            $placa = filter_input(INPUT_GET, 'placa', FILTER_SANITIZE_STRING);

          // obter o horário atual
          $data_hora_atual = date('Y-m-d H:i:s');


          // verificar se a saída do carro já foi registrada
          $query = "SELECT * FROM veiculos WHERE placa = '$placa' AND saida IS NULL";
          $resultado = mysqli_query($conn, $query);

          if (mysqli_num_rows($resultado) == 1) {
            // o carro está saindo do estacionamento, registrar a saída e calcular o valor a ser pago
            $registro = mysqli_fetch_assoc($resultado);
            $placa_registro = $registro['placa'];
            $entrada = $registro['entrada'];
            $diferenca_tempo = strtotime($data_hora_atual) - strtotime($entrada);
            $horas_totais = round($diferenca_tempo / 3600, 2); // converter segundos para horas e arredondar para 2 casas decimais

            if ($horas_totais <= 0.25) {
              // menos de 15 minutos, não cobrar nada
              $valor_pago = 0;
            } elseif ($horas_totais <= 1) {
              // até 1 hora, cobrar R$27
              $valor_pago = 27;
            } elseif ($horas_totais <= 2) {
              // até 2 horas, cobrar R$32
              $valor_pago = 32;
            } else {
              // mais de 2 horas, calcular o valor das horas adicionais
              $valor_horas_adicionais = ($horas_totais - 2) * 9;
              $valor_pago = 32 + $valor_horas_adicionais;
            }

            // atualizar o registro no banco de dados com o horário de saída e o valor pago
            $query = "UPDATE veiculos SET saida='$data_hora_atual', pagamento='$valor_pago' WHERE placa='$placa' AND saida IS NULL";
            $resultado = mysqli_query($conn, $query);

            $query = "SELECT * FROM veiculos WHERE placa = '$placa' AND saida ='$data_hora_atual' ";
            $resultado = mysqli_query($conn, $query);
            if (mysqli_affected_rows($conn)) {
              while ($row_veiculo = mysqli_fetch_assoc($resultado)) {
                echo "<h3><strong>Placa:</strong> " . $row_veiculo['placa'] . "</h3>";
                echo "<h3 class='text-capitalize'><strong>Marca:</strong> " . $row_veiculo['marca'] . "</h3>";
                echo "<h3 class='text-capitalize'><strong>Modelo:</strong> " . $row_veiculo['modelo'] . "</h3>";
                echo "<h3><strong>Entrada:</strong> " . $row_veiculo['entrada'] . "</h3>";
                echo "<h3><strong>Saida:</strong> " . $row_veiculo['saida'] . "</h3><hr>";
                echo "<h1 class='text-uppercase'>total a pagar - R$" . $row_veiculo['pagamento'] . "</h1><hr>";
                echo "<a style='text-decoration: none;' class='container btn-success rounded-3 text-uppercase text-center py-2 float-end'href='../buscar_veiculo.php'>Voltar</a>";
              }
            }
          } else {
            $_SESSION['msg'] = "";
            header('location: ../buscar_veiculo.php');
          }
          ?>

  </div>
</body>
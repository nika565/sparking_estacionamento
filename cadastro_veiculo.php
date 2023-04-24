<?php
  session_start();
?>

<!------------------------inicio do codigo html------------------------------>
<!DOCTYPE html>
<html lang="PT-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro do veículo</title>
  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/cadastro_de_veiculo.css">
  <link rel="shortcut icon" href="logo/SPARKING.png" type="image/x-icon">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</head>

<body>

  <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-danger">
    <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img width="150" src="logo/LOGOBRANCA.png" alt="Logo da Sparking"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
        <?php
            if($_SESSION['cargo'] == 'func'){
                echo '<a class="nav-link active" href="cadastro_veiculo.php">Cadastrar veículo</a>
                      <a class="nav-link" href="buscar_veiculo.php">Buscar veículo</a>';
            }else{
                echo'<a class="nav-link" aria-current="page" href="cad_func.php">Cadastrar</a>
                      <a class="nav-link" href="php/lista_empregados.php">Lista de empregados</a>
                      <a class="nav-link  active" href="cadastro_veiculo.php">Cadastrar veículo</a>
                      <a class="nav-link" href="buscar_veiculo.php">Buscar veículo</a>
                      <a class="nav-link" href="php/relatorio.php">Relatório</a>
                      <a class="nav-link" href="php/mensagem.php">Feedback</a>';
            }
        ?>
          <a class="nav-link" href="index.php">Home</a>
          <a id="login" class="nav-link" href="login.php">Login</a>
        </div>
      </div>
    </div>
  </nav>

  <?php

  /*Isset é uma função nativa do PHP que serve para saber se uma variável está definida.
    Ela basicamente verifica a existencia de uma variável, e assim, 
    retorna um valor booleano (true se for verdadeiro, e false se for falso). Ou seja, caso uma varável não esteja definida,
    ela possui o valor nulo (null).
    Para remover todas as variáveis de sessão globais e destruir a sessão, use session_unset() e session
     */
  if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
  }

  ?>


  <section>
    <div class="container-fluid d-flex-column justify-content-center align-items-center mt-5">

      <div class="row">
        <h1 class="text-uppercase display-5 fw-bold pb-3">CADASTRAR VEÍCULO</h1>
        <form id="cadastro_placa" action="php/proc_cad_veiculo.php" method="post">
          <h4 id="h4">Marca do carro</h4>
          <input type="text" class="p-2 form-control border-danger border-2" name="marca_do_carro"  autofocus required>
          <br>
          <h4 id="h4">Modelo do carro</h4>
          <input type="text" class="p-2 form-control border-danger border-2" name="modelo_do_carro" required>
          <br>
          <h4 id="h4">Placa do veículo</h4>
          <input type="text" class="p-2 form-control border-danger border-2" name="placa_veiculo" minlength="7" maxlength="7" required oninput="this.value = this.value.toUpperCase()">
          <br>
          <input type="submit" class="btn btn-success form-control" name="registrar" value="REGISTRAR">
        </form>
      </div>
    </div>
  </section>


</body>

</html>
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/cad_func.css">
  <link rel="shortcut icon" href="logo/SPARKING.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <title>Cadastrar funcionário</title>
</head>

<body id="body">

  <!--Inicio Header-->
  <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-danger">
    <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img width="150" src="logo/LOGOBRANCA.png" alt="Logo da Sparking"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="cad_func.php">Cadastrar</a>
          <a class="nav-link" href="php/lista_empregados.php">Lista de empregados</a>
          <a class="nav-link" href="cadastro_veiculo.php">Cadastrar veículo</a>
          <a class="nav-link" href="buscar_veiculo.php">Buscar veículo</a>
          <a class="nav-link" href="php/relatorio.php">Relatório</a>
          <a class="nav-link" href="php/mensagem.php">Feedback</a>
          <a class="nav-link" href="index.php">Home</a>
          <a id="login" class="nav-link" href="login.php">Login</a>
        </div>
      </div>
    </div>
  </nav>
  <!--Fim Header-->

  <?php
  if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
  }
  ?>

  <main>
    <div id="contlogin" class="container-fluid p-3 mt-5">
      <div id="divlogin">
        <h1 style="color: red;" class="text-uppercase display-5 fw-bold pb-3">Cadastro</h1>

        <form action="php/proc_cad_func.php" method="post">
          <label for="nome">Nome completo:</label><br>
          <input id="nome" name="nome" type="text" placeholder="Digite seu nome" autofocus required maxlength="100"><br>

          <label for="email">Email:</label><br>
          <input id="email" name="email" type="email" placeholder="Email:" required><br>

          <label for="cpf">CPF(Sem pontuação):</label><br>
          <input id="cpf" name="cpf" type="text" minlength="11" maxlength="11" placeholder="CPF:" required><br>

          <label for="senha">Senha:</label><br>
          <input id="senha" name="senha" type="password" placeholder="Senha:" required><br>

          <br>
          <p>Cargo:</p>

          <label for="cargo">Funcionário</label>
          <input id="cargo" name="cargo" type="radio" value="func" checked required>
          <label for="cargo">Administrador</label>
          <input id="cargo" name="cargo" type="radio" value="adm" autofocus><br>

          <button type="reset" id="cad_cancel">Cancelar</button>

          <button id="cad_func" type="submit">Cadastrar</button>
        </form>
      </div>
    </div>
  </main>


  <!--Footer-->
  <!-- <div id="footer-fluid" class="container-fluid">
        <div class="row bg-dark">

          <div class="col-md d-flex-column justify-content-center align-items-center flex-direction-column" id="txt_footer">
            <h2>Sparking</h2>
            <p>Procurando um estacionamento perto da Avenida João Dias? Nós temos a solução! Com equipe profissional de monitoramento e preços baixos, nosso estacionamento é a escolha ideal.</p>
          </div>

          <div class="col-md d-flex-column justify-content-center align-items-center flex-direction-column" id="txt_footer2">
            <h2>Estacionamento</h2>
            <ul>
              <li><a class="text-decoration-none text-white" href="">Home</a></li>

              <li><a class="text-decoration-none text-white" href="">Institucional</a></li>

              <li><a class="text-decoration-none text-white" href="">Quem somos</a></li>

              <li><a class="text-decoration-none text-white" href="index.html#session3">Preços e horários</a></li>
            </ul>
          </div>

          <div class="col-md d-flex-column justify-content-center align-items-center" id="txt_footer3">
            <h2>Entre em contato</h2> <br>
            
            <p><img name class="me-2" src="img/whatsapp.svg" alt="Ícone do Whatsapp"><strong>(11)92492-2443</strong></p>
            
            <p><img class="me-2" src="img/instagram.svg" alt="Ícone do Instagram"><strong>_parking</strong></p>
            
            
            <p><img class="me-2" src="img/facebook.svg" alt="Ícone do Facebook"><strong>Parking Estacionamentos</strong></p>

          </div>


          
        </div>
      </div> -->

</body>

</html>
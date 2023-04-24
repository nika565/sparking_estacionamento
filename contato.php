<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="logo/SPARKING.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style_contato.css">
  <title>Fale Conosco</title>
</head>

<body>

    <!--Inicio Header-->
    <div style="background-color: red;" class="container-fluid text-white ">
        <div class="row">
            <div class="col d-flex justify-content-around align-items-center">
                <p id="endereco_topo" class="m-2"><strong>R. Bento Branco Andrade, 37 - Santo Amaro | São Paulo - CEP 04571-233</strong></p>
    
                <div class="d-flex justify-content-around align-items-center">
                  <p id="ctt_topo1" class="m-4"><img class="me-2" src="img/telephone-fill.svg" alt="Ícone de um telefone"><strong>(11) 4002-8922</strong></p>
                  <p id="ctt_topo2" class="m-4"><img class="me-2" src="img/whatsapp.svg" alt="Ícone do whatsapp"><strong>(11) 92492-2443</strong></p>
                </div>
                
                <div>
                  <img id="ctt_topo3" class="m-3" src="img/instagram.svg" alt="Ícone do Instagram">
                  <img id="ctt_topo4" class="m-3" src="img/facebook.svg" alt="Ícone do Facebook">
                  <img id="ctt_topo5" class="m-3" src="img/twitter.svg" alt="Ícone do Twitter">
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php"><img width="150" src="logo/sparking_logo_home.png" alt="Logo da Sparking"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link" aria-current="page" href="index.php">Home</a>
              <a class="nav-link" href="institucional.php">Institucional</a>
              <a class="nav-link" href="blog.php">Blog</a>
              <a class="nav-link active" href="contato.php">Contato</a>
              <a id="login" class="nav-link" href="login.php">Login</a>
            </div>
          </div>
        </div>
    </nav>
      <!--Fim Header-->

  <!-- informações de contato -->
  <div class="row container-fluid mx-auto d-block my-5">
    <h1 class="text-uppercase text-center fw-bold display-4">fale conosco</h1>
  </div>

  <div class="row text-center mx-0">
    <div class="col-lg-3 container text-capitalize" id="card_informacao">
      <img id="img_informacao" class="mx-auto d-block my-5" src="./img/location.png" alt="ícone de localização">
      <p id="p_informacao">r. bento branco andrade filho, 37</p>
      <p id="p_informacao">santo amaro | SP</p>
    </div>

    <div class="col-lg-3 container" id="card_informacao">
      <img id="img_informacao" class="mx-auto d-block my-5" src="./img/phone.png" alt="ícone de telefone">
      <p id="p_informacao">(11) 1234-5678</p>
    </div>

    <div class="col-lg-3 container" id="card_informacao">
      <img id="img_informacao" class="mx-auto d-block my-5" src="./img/email.png" alt="ícone de envelope">
      <p id="p_informacao">contato.sparking@gmail.com</p>
    </div>
  </div>
  <!-- fim - informações de contato -->

  <!-- Enviar mensagem -->
  <div id="contato_menssagem" class="container-fluid pb-3 my-5">
    <div class="row container-fluid mx-auto d-block py-4">
      <h1 class="fs-2 fw-bold text-uppercase text-center">envie sua mensagem para a gente</h1>
    </div>

  <?php
    if (isset($_SESSION['msg'])) {
      echo $_SESSION['msg'];
      unset($_SESSION['msg']);
    }
  ?>

    <form method="post" action="php/proc_contato.php" class="container">
      <div class="row mb-4 text-capitalize">
        <div class="col-lg-6 mb-2">
          <label for="nome_enviar" class="form-label">nome</label>
          <input type="text" class="form-control" name="nome_enviar" id="nome_enviar" required>
        </div>

        <div class="col-lg-6">
          <label for="email_enviar" class="form-label">email</label>
          <input type="email" class="form-control" name="email_enviar" id="email_enviar" required>
        </div>
      </div>

      <div class="mb-3 text-capitalize">
        <label class="form-label" for="mensagem_enviar">mensagem</label>
        <textarea class="form-control" name="mensagem_enviar" id="mensagem_enviar" maxlength="1000" required></textarea>
      </div>
      <button type="submit" class="btn-success text-uppercase mx-auto d-block">enviar</button>
    </form>
  </div>
  <!-- Fim - enviar mensagens -->


  <footer>
    <div id="footer-fluid" class="container-fluid">
      <div class="row">

        <div class="col-md d-flex-column justify-content-center align-items-center flex-direction-column" id="txt_footer">
          <h2>Sparking</h2>
          <p>Procurando um estacionamento perto da Avenida João Dias? Nós temos a solução! Com equipe profissional de monitoramento e preços baixos, nosso estacionamento é a escolha ideal.</p>
        </div>

        <div class="col-md d-flex-column justify-content-center align-items-center flex-direction-column" id="txt_footer2">
          <h2>Estacionamento</h2>
          <ul>
            <li><a class="text-decoration-none text-white" href="index.php">Home</a></li>

            <li><a class="text-decoration-none text-white" href="institucional.php">Institucional</a></li>

            <li><a class="text-decoration-none text-white" href="contato.php">Contato</a></li>

            <li><a class="text-decoration-none text-white" href="index.php#session3">Preços e horários</a></li>
          </ul>
        </div>

        <div class="col-md d-flex-column justify-content-center align-items-center" id="txt_footer3">
          <h2>Entre em contato</h2> <br>

          <p><img name class="me-2" src="img/whatsapp.svg" alt="Ícone do Whatsapp"><strong>(11)92492-2443</strong></p>

          <p><img class="me-2" src="img/instagram.svg" alt="Ícone do Instagram"><strong>_parking</strong></p>


          <p><img class="me-2" src="img/facebook.svg" alt="Ícone do Facebook"><strong>Parking Estacionamentos</strong></p>

        </div>

      </div>
    </div>
  </footer>

</body>

</html>
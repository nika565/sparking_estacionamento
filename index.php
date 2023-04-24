<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="logo/SPARKING.png" type="image/x-icon">
    <link rel="stylesheet" href="css/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Sparking Estacionamentos</title>
</head>
<body id="body">
   
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
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              <a class="nav-link" href="institucional.php">Institucional</a>
              <a class="nav-link" href="blog.php">Blog</a>
              <a class="nav-link" href="contato.php">Contato</a>
              <a id="login" class="nav-link" href="login.php">Login</a>
            </div>
          </div>
        </div>
    </nav>
      <!--Fim Header-->
    
    <main>

      <!--Imagem com acesso a oagina de quem somos, preços e horários-->
      
      <div id="session1">
        <img width="100%" src="img/home.png" alt="Imagem de carros">
        <h1>Sparking</h1>
        <h2 id="slogan">Sua melhor opção em estacionamentos</h2>
        <p></p>
        <div class="buttons">

          <button><a class="text-decoration-none text-white" href="institucional.php">Quem somos</a></button>

          <button><a class="text-decoration-none text-white" href="index.php#session3">Preços e horários</a></button>
        </div>
        
      </div>
        
      <div id="session2" class="container-fluid d-flex-column justify-content-center text-center">
        <h3 style="color: red; font-weight: bold; margin-top: 50px;">Veja Nossa</h3>
        <h1 style="font-size: 40px; font-weight: bolder;">Localização</h1>
      </div>

      <!--MAPA GOOGLE MAPS-->
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3654.859494085602!2d-46.7226036!3d-23.6452024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce5111e18e6e61%3A0x523b5d1a9c40c027!2sR.%20Bento%20Branco%20de%20Andrade%20Filho%2C%2037%20-%20Jardim%20Dom%20Bosco%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2004757-000!5e0!3m2!1spt-BR!2sbr!4v1679768209746!5m2!1spt-BR!2sbr" width="100%" height="450" style="border: none;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      

      <!--PREÇOS E HORÁRIOS-->

      <div id="session3" class="container-fluid">
        <h1 class="mt-5 text-center" style="color: red;">Horários e preços</h1>
        <div class="row p-2 d-flex- justify-content-center">
          <output>
            <?php 
            include_once("php/conect.php");

            $query_item = "SELECT COUNT(id_veiculo) AS qtd_car FROM veiculos WHERE saida IS NULL";
            $result_item = mysqli_query($conn, $query_item);
            $row_item = mysqli_fetch_assoc($result_item);

            echo "<h3>Vagas disponíveis agora:  " . 200 - $row_item['qtd_car'] . "</h3><br>";
            ?>
          </output>

          <div id="timeprice1" class="col-md m-2">

            <div>
              <img style="margin: 45px;" width="150" src="img/parking-area.png" alt="Imagem de um carro estacionado">
              <h1>15 Minutos:</h1>
              <h2 style="color: green;">Cortesia</h2>
            </div>

          </div>

          <div id="timeprice2" class="col-md m-2">
            <div>
              <img style="margin: 45px;" width="150" src="img/parking-area.png" alt="Imagem de um carro estacionado">
              <h1>1 Hora:</h1>
              <h2 style="color: green;">R$27,00</h2>
            </div>
          </div>

          <div id="timeprice3" class="col-md m-2">
            <div>
              <img style="margin: 45px;" width="150" src="img/parking-area.png" alt="Imagem de um carro estacionado">
              <h1>2 Horas:</h1>
              <h2 style="color: green;">R$32,00</h2>
            </div>
          </div>

        </div>
        <h1 style="color: red;" class="text-center mt-5 mb-5">R$9,00 por hora adicional</h1>
      </div>

    </main>

    <!--Footer-->
      <div id="footer-fluid" class="container-fluid">
        <div class="row bg-dark">

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
    
</body>
</html>
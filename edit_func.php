<?php
session_start();
include_once("php/conect.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM empregados WHERE id_empregados = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
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
  <title>Editar Funcionário</title>
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
          <a class="nav-link" aria-current="page" href="cad_func.php">Cadastrar</a>
          <a class="nav-link active" href="php/lista_empregados.php">Lista de empregados</a>
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
    <div id="contlogin" class="container-fluid p-3">
      <div id="divlogin">
        <h1 class="text-uppercase fs-2" style="color: red;">editar empregado</h1>

        <form action="php/proc_edit_func.php" method="post">
          <input type="hidden" name="id" value='<?php echo $row_usuario["id_empregados"]; ?>'>

          <label for="nome">Nome:</label><br>
          <input id="nome" name="nome" type="text" value="<?php echo $row_usuario['nome']; ?>" placeholder="Altere o nome" autofocus required maxlength="100"><br>

          <label for="email">Email:</label><br>
          <input id="email" name="email" type="email" value="<?php echo $row_usuario['email']; ?>" placeholder="Novo email:" required><br>

          <label for="senha">Senha:</label><br>
          <input id="senha" name="senha" type="password" value="<?php echo $row_usuario['senha']; ?>" placeholder="Nova senha:" required><br>

          <br>
          <p>Cargo:</p>

          <label for="cargo">Funcionário</label>
          <input id="cargo" name="cargo" type="radio" value="func" required>
          <label for="cargo">Administrador</label>
          <input id="cargo" name="cargo" type="radio" value="adm"><br>

          <a style="text-decoration: none;" class="px-2" href="php/lista_empregados.php" id="cad_cancel">Cancelar</a>

          <button class="px-3" id="cad_func" type="submit">Alterar</button>
        </form>
      </div>
    </div>
  </main>
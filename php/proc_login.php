<?php
session_start();
include_once("conect.php");

if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);

    
}



$login_email = filter_input(INPUT_POST, 'login_email', FILTER_SANITIZE_EMAIL);
$login_senha_crua = filter_input(INPUT_POST, 'login_senha', FILTER_SANITIZE_STRING);
$login_senha = sha1($login_senha_crua);

//neste codigo ele ira verificar se existe em nosso banco de dados os parametros filtrados em senha e email e que correspondam ao cardo de "adm" adiministrador//
$login_confirm_adm = "SELECT * FROM empregados  WHERE email = '$login_email' and senha ='$login_senha' and cargo = 'adm'";
$login_confirma_adm = mysqli_query($conn, $login_confirm_adm);
$login_confirmado_adm = mysqli_fetch_assoc($login_confirma_adm);

//neste codigo ele ira verificar se existe em nosso banco de dados os parametros filtrados em senha e email e que correspondam ao cardo de "func" funcionario//
$login_confirm_func = "SELECT * FROM empregados  WHERE email = '$login_email' and senha ='$login_senha' and cargo = 'func'";
$login_confirma_func = mysqli_query($conn, $login_confirm_func);
$login_confirmado_func = mysqli_fetch_assoc($login_confirma_func);

//aqui ele confirma se as linhas retornadas são iguais á zero, caso sejam elas vão redirecionar para pagina de login
if  ((mysqli_num_rows($login_confirma_adm) == 0 ) && (mysqli_num_rows($login_confirma_func) == 0)){
   echo $_SESSION['msg'] = "<div class='row text-center m-0'><p class='display-6 mt-4' style='color:red;'>EMAIL OU SENHA INCORRETOS</p></div>";
   header('Location: ../login.php');

//nos dois if's é analizado se alguma das query retornaram linhas maiores que Zero, a linha que for verdadeira levará para determinada pagina referente ao seu cargo 
}else if (mysqli_num_rows($login_confirma_adm) > 0)  {
   echo $_SESSION['msg'] ="<div class='row text-center m-0'><p class='display-6 mt-4' style='color:green;'>BEM VINDO ADMINISTRADOR</p></div>";
   $_SESSION['cargo'] = 'adm';
    header('Location: ../cad_func.php');

} else if (mysqli_num_rows($login_confirma_func) > 0){
   echo $_SESSION['msg'] = "<div class='row text-center m-0'><p class='display-6 mt-4' style='color:green;'>BEM VINDO FUNCIONÁRIO</p></div>";
   $_SESSION['cargo'] = 'func';
    header('Location: ../cadastro_veiculo.php');
}


?>
<?php

session_start();
include_once("conect.php");

?>

<?php
date_default_timezone_set('America/Sao_Paulo');
$nome = filter_input(INPUT_POST, 'nome_enviar', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email_enviar', FILTER_SANITIZE_EMAIL);
$mensagem = filter_input(INPUT_POST, 'mensagem_enviar', FILTER_SANITIZE_STRING);
$data_hora = date('Y-m-d H:i:s');

$result_usuario = "INSERT INTO cliente (nome, email, mensagem, data_msg) VALUES ('$nome', '$email', '$mensagem', '$data_hora')";
$insert_cli = mysqli_query($conn, $result_usuario);
// mysqli_query realiza uma execução de algo e põe o que deve ser feito dentro dos ().
if (mysqli_insert_id($conn)) {
    $_SESSION['msg'] = "<script>alert('Mensagem enviada com sucesso!')</script>";
    header("location: ../contato.php");
} else {
    $_SESSION['msg'] = "<script>alert('Erro - a mensagem não foi enviada!')</script>";
    header("location: ../contato.php");
}

?>

<!-- <p style='color:green;'>MESAGEM ENVIADA</p> -->
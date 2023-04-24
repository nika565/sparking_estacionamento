<?php

date_default_timezone_set('America/Sao_Paulo');

session_start();
include_once("conect.php");
/* A Declaração include_once inclui e avalia o arquivo informado durante a execução do script.
Este é um comportamento  similar a declaração include, com a unica diferença que, se o código ou arquivo já foi incluído, 
não o fará novamente, e o include_once retornará true */

// Salvar data e horário
$data_hora = date('Y-m-d H:i:s');

// Salvar o horário de funcionamento do estacionamento
$hora_atual = date('H');

// Expressões regulares referente a Placa Mercosul
$regex = '/[a-zA-Z]{3}[0-9]{1}[a-zA-Z]{1}[0-9]{2}/';
// Expressões regulares referente a Placa Antiga
$regex2 = '/[a-zA-Z]{3}[0-9]{4}/';
$placa = $_POST['placa_veiculo'];
// Validação das duas placas
$validacao1 = preg_match($regex, $placa);
$validacao2 = preg_match($regex2, $placa);

// Verificando se a placa é valida antes de inserir no banco de dados
if ($validacao1 == true or $validacao2 == true) {
    $_SESSION['placa_veiculo'] = $placa;
    // FILTER_SANITIZE_STRING : remove todas as tags HTML de uma string
    $marca_do_carro = filter_input(INPUT_POST, 'marca_do_carro', FILTER_SANITIZE_STRING);
    $modelo_do_carro = filter_input(INPUT_POST, 'modelo_do_carro', FILTER_SANITIZE_STRING);
    $placa_veiculo = filter_input(INPUT_POST, 'placa_veiculo', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM veiculos WHERE placa = '$placa' LIMIT 1";
    $resultado = mysqli_query($conn, $sql);

    if(mysqli_num_rows($resultado) > 0){
        $row = mysqli_fetch_assoc($resultado);
        $modelo_pre_exist = $row["modelo"];
        $marca_pre_exist = $row["marca"];
    }else{
        $modelo_pre_exist = $modelo_do_carro;
        $marca_pre_exist = $marca_do_carro;

    }

    if($modelo_do_carro == $modelo_pre_exist AND $marca_do_carro == $marca_pre_exist){
        $duplicado = mysqli_query($conn, "SELECT * FROM veiculos WHERE placa = '$placa' AND marca = '$marca_do_carro' AND modelo = '$modelo_do_carro' AND saida IS NULL");
    if (mysqli_num_rows($duplicado) > 0) {
        // Registro já existe, mostra mensagem de erro ou faz outra ação desejada
        $_SESSION['msg'] = "<div class='row text-center m-0'><p class='display-6 mt-4' style='color:red;'>JÁ EXISTE UM CARRO COM ESSA PLACA NO ESTACIONAMENTO</p></div>";
        header("Location: ../cadastro_veiculo.php");
    } else {
        // Registro não existe, insere o novo registro
        mysqli_query($conn, "INSERT INTO veiculos (marca, modelo, placa, entrada) VALUES ('$marca_do_carro', '$modelo_do_carro', '$placa_veiculo', '$data_hora')");
        $_SESSION['msg'] = "<div class='row text-center m-0'><p class='display-6 mt-4' style='color:green;'>VEÍCULO CADASTRADO</p></div>";
        header("Location: ../cadastro_veiculo.php");
    }
    

} else {
    $_SESSION['msg'] = "<div class='row text-center m-0'><p class='display-6 mt-4' style='color:red;'>VERIFIQUE SE A PLACA FOI DIGITADA CORRETAMENTE</p></div>";
            header("Location: ../cadastro_veiculo.php");

}
}else{
    $_SESSION['msg'] = "<div class='row text-center m-0'><p class='display-6 mt-4' style='color:red;'>VERIFIQUE SE A PLACA FOI DIGITADA CORRETAMENTE</p></div>";
        header("Location: ../cadastro_veiculo.php");
}

    
    

?>
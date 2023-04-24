<?php
    date_default_timezone_set('America/Sao_Paulo');
    session_start();
    include_once('conect.php');
    
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    $cargo = filter_input(INPUT_POST, 'cargo', FILTER_SANITIZE_STRING);
    $data_criado = date("Y-m-d H:i:s"); //date('Y/m/d:H:i:s');
    $criptografia = sha1($senha);

// echo "$nome<br>$cpf<br>$email<br>$senha<br>$cargo<br>$data_criado<br>$criptografia<br>";
$verificar_duplicata = "SELECT * FROM empregados WHERE cpf = '$cpf'";
$executa_conexao = mysqli_query($conn, $verificar_duplicata);
$linha_empregado = mysqli_fetch_assoc($executa_conexao);

// Aqui inicia-se a validação do CPF
if(($cpf == '00000000000') || ($cpf == '11111111111') || ($cpf == '22222222222') || ($cpf == '33333333333') || ($cpf == '44444444444') ||
        ($cpf == '55555555555') || ($cpf == '66666666666') || ($cpf == '77777777777') || ($cpf == '88888888888') || ($cpf == '99999999999')){
    $_SESSION['msg'] = "<div class='row text-center'><p class='display-6 my-4' style='color:red;'>ERRO - CPF INVÁLIDO</p></div>";
    header("Location: ../cad_func.php");
}elseif ($cpf == $linha_empregado['cpf']) {
    $_SESSION['msg'] = "<div class='row text-center'><p class='display-6 my-4' style='color:red;'>ERRO - CPF JÁ EXISTENTE</p></div>";
    header("Location: ../cad_func.php");
}else {
    $cpf_separado = '';
    $contador = 0;
    $soma_peso = 0;
    $peso = 10;

    // 1º Passo - Separar os primeiros 9 dígitos dos 2 dígitos verificadores
    for ($separar = 0; $separar < strlen($cpf); $separar++) {
        $cpf_separado = $cpf_separado . $cpf[$separar];
        $contador++;

        if ($contador == 9) {
            break;
        }
    }

    $cpf_digito = $cpf[9] . $cpf[10];

    // 2º Passo - Multiplicar os pesos
    for ($selecionar = 0; $selecionar < strlen($cpf_separado); $selecionar++) {
        $converter_int = intval($cpf_separado[$selecionar]);
        $soma_peso += $converter_int * $peso;
        $peso--;

        if ($peso == 1) {
            break;
        }
    }

    // 3º Passo - achar o 1º dígito verificador e juntá-lo com os 9 dígitos
    if (($soma_peso  % 11) < 2) {
        $digito1 = '0';
    } else {
        $digito1 = strval(11 - ($soma_peso % 11));
    }

    $cpf_separado = $cpf_separado . $digito1;

    // FIM DO PRIMEIRO CICLO

    $soma_peso = 0;
    $peso = 11;

    // 5º Passo - Multiplicar novamente os pesos
    for ($selecionar = 0; $selecionar < strlen($cpf_separado); $selecionar++) {
        $converter_int = intval($cpf_separado[$selecionar]);
        $soma_peso += $converter_int * $peso;
        $peso--;

        if ($peso == 1) {
            break;
        }
    }

    // 6º Passo - Achar o 2º dígito e juntá-lo com os 10 dígitos e com o 1º dígito verificador
    if (($soma_peso % 11) < 2) {
        $digito2 = '0';
    } else {
        $digito2 = strval(11 - ($soma_peso % 11));
    }

    $cpf_valido = $cpf_separado . $digito2;
    $digito_verificador = $digito1 . $digito2;

    // 5° Passo - Validar
    if (($cpf == $cpf_valido) && ($cpf_digito == $digito_verificador)) {
        $cpf_correto = true;
    } else {
        $cpf_correto = false;
    }
    //Término da validação do CPF

    if ($cpf_correto == true) {
        $verificar_duplicata = "SELECT * FROM empregados WHERE email = '$email'";
        $executa_conexao = mysqli_query($conn, $verificar_duplicata);
        $linha_empregado = mysqli_fetch_assoc($executa_conexao);

        if($email == $linha_empregado['email']){
            $_SESSION['msg'] = "<div class='row text-center'><p class='display-6 my-4' style='color:red;'>ERRO - EMAIL JÁ EXISTENTE</p></div>";
            header("Location: ../cad_func.php");
        }else{
            $inserir_empregado = "INSERT INTO  empregados (nome, email, cpf, senha, cargo, criado) VALUES ('$nome','$email','$cpf','$criptografia','$cargo','$data_criado')";
            $executa_conexao = mysqli_query($conn, $inserir_empregado);
    
            if (mysqli_insert_id($conn)) {
                $_SESSION['msg'] = "<p style='color:green;'>EMPREGADO CADASTRADO COM SUCESSO</p><hr>";
                header("Location: lista_empregados.php");
            } else {
                $_SESSION['msg'] = "<div class='row text-center'><p class='display-6 my-4' style='color:red;'>EMPREGADO NÃO CADASTRADO</p></div>";
                header("Location: ../cad_func.php");
            }
        }
    } else {
        $_SESSION['msg'] = "<div class='row text-center'><p class='display-6 my-4' style='color:red;'>ERRO - CPF INVÁLIDO</p></div>";
        header("Location: ../cad_func.php");
    }
}

?>
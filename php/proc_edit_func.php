<?php
    date_default_timezone_set("America/Sao_Paulo");
    session_start();
    include_once("conect.php");

    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    $cargo = filter_input(INPUT_POST, 'cargo', FILTER_SANITIZE_STRING);
    $data_modificado = date("Y-m-d H:i:s");

    $verificar_duplicata = "SELECT * FROM empregados WHERE email = '$email'";
    $executa_conexao = mysqli_query($conn, $verificar_duplicata);
    $linha_empregado = mysqli_fetch_assoc($executa_conexao);

    if($email == $linha_empregado['email'] and $id != $linha_empregado['id_empregados']){
        $_SESSION['msg'] = "<p style='color:red;'>NÃO FOI POSSÍVEL ALTERAR - O EMAIL INSERIDO JÁ EXISTE</p><hr>";
        header("Location: lista_empregados.php");
    }else{
        $result_usuario = "SELECT * FROM empregados WHERE id_empregados = '$id'";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        $row_usuario = mysqli_fetch_assoc($resultado_usuario);
    
        if($senha == $row_usuario['senha']){
            $result_usuario = "UPDATE empregados SET nome='$nome', email='$email', senha='$senha', cargo='$cargo', modificado='$data_modificado' WHERE id_empregados='$id'";
            $resultado_usuario = mysqli_query($conn, $result_usuario);
        }else{
            $criptografia = sha1($senha);
            $result_usuario = "UPDATE empregados SET nome='$nome', email='$email', senha='$criptografia', cargo='$cargo', modificado='$data_modificado' WHERE id_empregados='$id'";
            $resultado_usuario = mysqli_query($conn, $result_usuario);
        }
        
        if(mysqli_affected_rows($conn)){
            $_SESSION['msg'] = "<p style='color:green;'>USUARIO EDITADO COM SUCESSO</p><hr>";
            header("Location: lista_empregados.php");
        }else{
            $_SESSION['msg'] = "<p style='color:red;'>USUARIO NÃO EDITADO</p><hr>";
            header("Location: ../edit_func.php?id=$id");
        }
    }

?>
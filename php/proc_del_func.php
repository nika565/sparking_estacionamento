<?php
    session_start();
    include_once("conect.php");
    
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    if(!empty($id)){
        $result_usuario = "DELETE FROM empregados WHERE id_empregados = '$id'";
        $resultado_usuario = mysqli_query($conn, $result_usuario); 
        if(mysqli_affected_rows($conn)){
            $_SESSION['msg'] = "<p style='color:green;'>EMPREGADO DELETADO COM SUCESSO</p><hr>";
            header("location: lista_empregados.php");
        }else{
            $_SESSION['msg'] = "<p style='color:red;'>ERRO - O EMPREGADO NÃO FOI DELETADO</p><hr>";
            header("location: lista_empregados.php");
        }
    }else{
        $_SESSION['msg'] = "<p style='color:red;'>SELECIONE UM EMPREGADO</p><hr>";
        header("location: lista_empregados.php");
    }
?>
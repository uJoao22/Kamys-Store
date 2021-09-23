<?php
    require_once("../../conexao/conexao.php");
    
    //Verificando EMAIL
    if (isset($_POST["email"])) {
        $emailDigitado = $_POST["email"];
        
        $selectEmail = "SELECT * FROM usuarios WHERE email = '{$emailDigitado}' ";
        $listaEmail = mysqli_query($conect, $selectEmail);

        if(mysqli_num_rows($listaEmail) > 0) {
            echo json_encode(array('email' => 'E-mail já cadastrado', 'verification' => '1')); 
        } else {
            echo json_encode(array('email' => ' ', 'verification' => '0' )); 
        }

    }
?>
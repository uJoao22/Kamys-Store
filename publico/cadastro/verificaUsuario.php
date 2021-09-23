<?php
    require_once("../../conexao/conexao.php");
    
    //Verificando USUARIO
    if (isset($_POST["usuario"])) {
        $usuarioDigitado = $_POST["usuario"];
        
        $selectUsuario = "SELECT * FROM usuarios WHERE usuario = '{$usuarioDigitado}' ";
        $listaUsuario = mysqli_query($conect, $selectUsuario);

        if(mysqli_num_rows($listaUsuario) > 0) {
            echo json_encode(array('usuario' => 'Nome de usuário já cadastrado', 'verification' => '1')); 
        } else {
            echo json_encode(array('usuario' => ' ', 'verification' => '0')); 
        }

    }
?>
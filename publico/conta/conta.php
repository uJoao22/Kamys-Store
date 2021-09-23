<?php require_once("../../conexao/conexao.php");
    session_start();

    if (isset($_SESSION["userKamys"])) { //INFORMAÇÕES DO USUARIO LOGADO
        $user = $_SESSION["userKamys"]["usuarioID"];

        $selectUsuario = "SELECT * FROM usuarios WHERE usuarioID = '{$user}'";
        $listaUsuario = mysqli_query($conect, $selectUsuario);
        if (!$listaUsuario) {
            die("Falha na consulta de informações de usuários");
        }
        $linhaUsuario = mysqli_fetch_assoc($listaUsuario);
        $nome       = $linhaUsuario["nome"];
        $email      = $linhaUsuario["email"];
        $ddd        = $linhaUsuario["ddd"];
        $celular    = $linhaUsuario["celular"];

        $cep            = $linhaUsuario["cep"];
        $estado         = $linhaUsuario["estadoID"];
        $cidade         = $linhaUsuario["cidade"];
        $endereco       = $linhaUsuario["endereco"];
        $numero         = $linhaUsuario["numero"];
        $complemento    = $linhaUsuario["complemento"];

        $usuario    = $linhaUsuario["usuario"];
        $email      = $linhaUsuario["email"];
        $senha      = $linhaUsuario["senha"];
    } else {
        header("location: ../index/index.php");
    }

    if (isset($_GET["c"])) { //NAVEGAÇÃO PELA BARRA LATERAL
        $info = $_GET["c"];
    } else {
        $info = 1;
    }

    $selectEstados = "SELECT * FROM estados "; //CONSULTA NA TABELA DE ESTADOS
    $listaEstados = mysqli_query($conect, $selectEstados);
    if (!$listaEstados){
        die("Falha na consulta dos Estados");
    }

    if(isset($_POST["email"])){ //ALTERAÇÃO DE INFORMAÇÕES PESSOAIS
        $nome       = $_POST["nome"];
        $email      = $_POST["email"];
        $ddd        = $_POST["ddd"];
        $celular    = $_POST["cel"];
        
        $updateInfoPessoais = "UPDATE usuarios SET ";
        $updateInfoPessoais .= " nome = '{$nome}', email = '{$email}', ddd = '{$ddd}', celular = '{$celular}' ";
        $updateInfoPessoais .= " WHERE usuarioID = {$user} ";

        $operationUpdate1 = mysqli_query($conect, $updateInfoPessoais);
        if(!$operationUpdate1){
            die("Falha na alteração");
        }
    }

    if(isset($_POST["endereco"])){ //ALTERAÇÃO DE DADOS DE ENVIO
        $cep            = $_POST["cep"];
        $estadoID       = $_POST["estado"];
        $cidade         = $_POST["cidade"];
        $endereco       = $_POST["endereco"];
        $numero         = $_POST["numero"];
        $complemento    = $_POST["complemento"];
        
        $updateDataEnvio = "UPDATE usuarios SET ";
        $updateDataEnvio .= " cep = '{$cep}', estadoID = '{$estadoID}', cidade = '{$cidade}', endereco = '{$endereco}', numero = '{$numero}', complemento = '{$complemento}' ";
        $updateDataEnvio .= " WHERE usuarioID = {$user} ";

        $operationUpdate2 = mysqli_query($conect, $updateDataEnvio);
        if(!$operationUpdate2){
            die("Falha na alteração");
        }
    }

    if(isset($_POST["usuario"])){ //ALTERAÇÃO DE DADOS DA CONTA
        $usuario        = $_POST["usuario"];
        $senha          = $_POST["senha"];
        
        $updateDataAccount = "UPDATE usuarios SET ";
        $updateDataAccount .= " usuario = '{$usuario}', senha = '{$senha}' ";
        $updateDataAccount .= " WHERE usuarioID = {$user} ";

        $operationUpdate3 = mysqli_query($conect, $updateDataAccount);
        if(!$operationUpdate3){
            die("Falha na alteração");
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <!-- META TAGS -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="João Pedro Botelho">
    <meta name="description" content="Projeto Educativo, TCC, Escola Polimig">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Estilo - CSS -->
    <link rel="stylesheet" text="text/css" href="conta.css">
    <!-- Fontes -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,700;1,500&display=swap" rel="stylesheet">
    <!-- Infos -->
    <link rel='icon' type='image/png' href="../images/outras/icone.png">
    <title>Kamy's Store</title>
    <!-- Scripts -->
    <script src="../_assets/files/jquery-3.6.0.min.js"></script>
</head>

<body>
    <main class="d-flex justify-content-between">

        <?php require_once("navConta.php"); ?>

        <div class="pb-3 container">
            <?php
            switch ($info) {
                case 1:    
                    require_once("infoPessoais.php");
                break;
                case 2: 
                    require_once("dadosEnvio.php");
                break;
                case 3:  
                    require_once("dadosConta.php");
                break;
                case 4: 
            ?>
                    <h2 class="mb-5">Pedidos</h2>
                    <p>Pedidos, testando nome: <?php echo "Sem info" ?>! </p>

            <?php
                break;
                default:
                    header("location: conta.php?c=1");
            }
            ?>

        </div>

    </main>

    <script src="conta.js"></script>
    <script src="validation_Info_Pessoais.js"></script>
    <script src="validation_Data_Envio.js"></script>
    <script src="validation_Data_Account.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
<?php mysqli_close($conect); ?>
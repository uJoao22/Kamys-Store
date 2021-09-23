<?php require_once("../../conexao/conexao.php"); 
    session_start();

    if(isset($_SESSION["userKamys"])) {
        $infoUser = $_SESSION["userKamys"];

        if($infoUser["nivel"] != "admin"){
            header("location: ../conta/conta.php");
        }
    } else {
        header("location: ../index/index.php");
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
    <!-- Fontes -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,700;1,500&display=swap" rel="stylesheet">
    <!-- Infos -->
    <link rel='icon' type='image/png' href="../images/outras/icone.png">
    <title>Kamy's Store</title>
    <!-- Scripts -->
    <script src="../_assets/files/jquery-3.6.0.min.js"></script>
</head>

<body>
    <a href="../index/index.php">Ir para index</a></br>

    <a href="sair.php">Sair</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

<?php mysqli_close($conect); ?>
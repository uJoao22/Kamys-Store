<?php require_once("../../conexao/conexao.php"); 

    if (isset($_GET["k"]) ) {
        $produto_id = $_GET["k"];
    } else {
        Header("Location: index.php");
    }

    //Selecionando os detalhes dos produtos
    $selectDetalhe = "SELECT * ";
    if (!isset($_POST["cor"])) {
        $selectDetalhe .= " ,MIN(detalheID) ";
    }

    $selectDetalhe .= " FROM produto_detalhe WHERE produtoID = {$produto_id} ";

    if(isset($_POST["cor"])) {
        $corID = $_POST["cor"];
        $selectDetalhe .= " HAVING detalheID = {$corID} ";
    }
    
    $listaDetalhe = mysqli_query($conect, $selectDetalhe);
    if (!$listaDetalhe) {
        die("Falha para encontrar os detalhes");
    }

    $selectProduto = "SELECT nomeProduto, preco FROM produtos WHERE produtoID = {$produto_id}; ";
    $listaProduto = mysqli_query($conect, $selectProduto);
    if (!$listaProduto) {
        die("Falha para encontrar Nome e preço");
    }

    $dadosProduto   = mysqli_fetch_assoc($listaProduto);
    $nomeProduto    = $dadosProduto["nomeProduto"];
    $preco          = $dadosProduto["preco"];

    //Selecionando cor
    $selectCor = "SELECT detalheID, cor FROM produto_detalhe WHERE produtoID = {$produto_id} ";
    $listaCor = mysqli_query($conect, $selectCor);
    if (!$listaCor) {
        die("Falha para encontrar cor");
    }

    function real_format($valor) {
        $valor  = number_format($valor,2,",",".");
        return "R$ " . $valor;
    }

   require_once("cores.php");
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
    <link rel="stylesheet" text="text/css" href="../nav/nav.css">
    <link rel="stylesheet" text="text/css" href="produto.css">
    <!-- Fontes -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,700;1,500&display=swap" rel="stylesheet">
    <!-- Infos -->
    <link rel='icon' type='image/png' href="../images/outras/icone.png">
    <title>Kamy's Store</title>
    <!-- Scripts -->
    <script src="../_assets/files/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="../nav/nav.js"></script>
</head>

<body>
    <?php require_once("../nav/nav.php"); ?>

    <main class="w-100">
        <div class="container">

            <?php while ($dadosDetalhe = mysqli_fetch_assoc($listaDetalhe)) { ?>

                <ul class="w-100 d-flex listDados justify-content-around mb-1">
                    <li class="w-100 nomeMobile"><h2><?php echo $nomeProduto ?></h2></li>

                    <li class="imagem h-100">
                        <?php require_once("carrosel.php"); ?>
                    </li>

                    <div class="d-flex flex-column h-100 infoProdutos p-2">
                        <li class="my-2 nomeDesktop"><h2><?php echo $nomeProduto ?></h2></li>
                        <li class="my-2"><b>Preço: </b><?php echo real_format($preco) ?></li>
                        
                        <form action="" method='post'>
                            <div class="mb-2"> <b>Cor: </b></b><?php echo $dadosDetalhe["cor"] ?></br></div>
                            <div class="d-flex">
                                <?php
                                    while($dadosCor = mysqli_fetch_assoc($listaCor)) {
                                        echo "<div class='me-2 d-flex justify-content-center align-items-center rounded-circle divCor' ";
                                        if($dadosCor['detalheID'] == $dadosDetalhe['detalheID']) {
                                            echo " style='border: .13em groove rgba(0, 0, 0, 0.7);'";
                                        }
                                        echo "><button style='background:". color_format($dadosCor['cor']) .";' ";
                                        echo "class='cores rounded-circle' name='cor' value='". $dadosCor['detalheID'] ."'>  </button></div>";
                                    }  
                                ?>
                            </div>
                            
                            <label class="mt-4" for="tamanho">Tamanho:</label>
                            <select id="tamanho" name="tamanho" class="w-50 mb-4 form-select tamanho py-1">
                                <option value="PP">PP</option>
                                <option value="P">P</option>
                                <option value="M">M</option>
                                <option value="G">G</option>
                            </select>

                            <label for="quantidade">Quantidade:</label>
                            <input type="number" class="form-control w-25 quantidade py-1" name="quantidade" id="quantidade" min="1" max="<?php echo $dadosDetalhe["estoque"] ?>" placeholder="1"/>

                            <li class="mt-4"><b><u>Descrição:</u> </b></br><?php echo $dadosDetalhe["descricao"] ?></li>

                            <button type="submit" class="btn w-100 mt-4 adc">Adicionar ao carrinho</button>
                        </form>
                    </div>
                </ul>

            <?php } ?>
        </div>
    </main>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
<?php mysqli_close($conect); ?>
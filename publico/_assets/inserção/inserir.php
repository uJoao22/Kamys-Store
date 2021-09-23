<?php 
require_once("../conexao/conexao.php"); 
require_once("funcoes.php");
?>

<?php
    //utf8_decode - Codifica uma string UTF8 para ISO
    //utf8_encode - Codifica uma string ISO para UTF8
    
    //Inserção no Banco
    if (isset($_POST["nomeProduto"])){
        $nome           = $_POST["nomeProduto"];
        $preco          = $_POST["preco"];
        $imgPrincipal   = publicarArquivo($_FILES['imgPrincipal']);
        $categoria      = $_POST["categoria"];

        $inserir = "INSERT INTO produtos ";
        $inserir .= " (nomeProduto, preco, imgPrincipal, categoriaID) ";
        $inserir .= " VALUES ('$nome', '$preco', '$imgPrincipal', $categoria)";

        $operacao_inserir = mysqli_query($conect, $inserir);

        if (!$operacao_inserir){
            die("Erro no Banco");
        } else {
            header("location: inserir.php");
        }
    }

    //Seleção de estados
    $select = "SELECT categoriaID, nomeCategoria ";
    $select .= " FROM categorias ";

    $lista_categoria = mysqli_query($conect, $select);

    if (!$lista_categoria){
        die("Falha na consulta ao banco de dados");
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP Integração com MySQL</title>
        
        <!-- estilo -->
        <style>
            input{
                display: block;
                margin: 10px 0  10px 0;
                padding: 5px;
            }

            input[type=submit] {
                padding: 5px 50px ;
            }
        </style>
            
    </head>

    <body>
        
        <main>  

            <div id="janela_formulario">
                <form action="inserir.php" method="post" enctype="multipart/form-data">
                    <input type="text" name="nomeProduto" placeholder="Nome do Produto">
                    <input type="text" name="preco" placeholder="Preço">

                    <input type="hidden" name="MAX_FILE_SIZE" value="30000000"> 
                    <input type="file" name="imgPrincipal">

                    <select name="categoria">
                        <?php
                            while ($linha = mysqli_fetch_assoc($lista_categoria)) {
                        ?>
                            <option value="<?php echo $linha["categoriaID"]; ?>"> 
                                <?php echo $linha["nomeCategoria"]; ?> 
                            </option>
                        <?php
                            }
                        ?>
                    </select>
                    
                    <input type="submit" value="Inserir">

                </form>

                <?php
                if(isset($mensagem)){ //Se mensagem estiver configurada
                    echo $mensagem; //Imprima mensagem
                }
                ?>

            </div>
        </main>

    </body>
</html>

<?php
    mysqli_close($conect);
?>
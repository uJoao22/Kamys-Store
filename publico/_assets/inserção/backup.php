<?php 
require_once("../conexao/conexao.php"); 
require_once("funcoes.php");
?>

<?php
    //utf8_decode - Codifica uma string UTF8 para ISO
    //utf8_encode - Codifica uma string ISO para UTF8
    
    //Inserção no Banco
    if (isset($_POST["cor"])){
        
        $resultado1   = publicarArquivo($_FILES['imgPrincipal']);
        $resultado2   = publicarArquivo($_FILES['img2']);
        if(isset($_POST["img3"])) { $resultado3   = publicarArquivo($_FILES['img3']); }
        if(isset($_POST["img4"])) { $resultado4   = publicarArquivo($_FILES['img4']); }
        if(isset($_POST["img5"])) { $resultado5   = publicarArquivo($_FILES['img5']); }
        if(isset($_POST["img6"])) { $resultado6   = publicarArquivo($_FILES['img6']); }

        $mensagem1 = $resultado1[0];
        $mensagem2 = $resultado2[0];
        if(isset($resultado3)) { $mensagem3   = $resultado3[0]; }
        if(isset($resultado4)) { $mensagem4   = $resultado4[0]; }
        if(isset($resultado5)) { $mensagem5   = $resultado5[0]; }
        if(isset($resultado6)) { $mensagem6   = $resultado6[0]; }

        $produto           = $_POST["produto"];
        $descricao         = $_POST["descricao"];
        $cor               = $_POST["cor"];
        $estoque           = $_POST["estoque"];

        $imgPrincipal   = $resultado1[1];
        $img2           = $resultado2[1];
        if(isset($resultado3)) { $img3   = $resultado3[1]; }
        if(isset($resultado4)) { $img4   = $resultado4[1]; }
        if(isset($resultado5)) { $img5   = $resultado5[1]; }
        if(isset($resultado6)) { $img6   = $resultado6[1]; }      

        $categoria      = $_POST["categoria"];

        $inserir = "INSERT INTO produto_detalhe ";
        $inserir .= " (produtoID, descricao, cor, estoque, imgPrincipal, img2, categoriaID";
        if(isset($_POST["img3"])) {
            $inserir .= ", img3";
        }
        if(isset($_POST["img4"])) {
            $inserir .= ", img4";
        }
        if(isset($_POST["img5"])) {
            $inserir .= ", img5";
        }
        if(isset($_POST["img6"])) {
            $inserir .= ", img6";
        }
        $inserir .= ") ";

        $inserir .= " VALUES ($produto, '$descricao', '$cor', $estoque, '$imgPrincipal', '$img2', $categoria ";
        if(isset($_POST["img3"])) {
            $inserir .= ", $img3";
        }
        if(isset($_POST["img4"])) {
            $inserir .= ", $img4";
        }
        if(isset($_POST["img5"])) {
            $inserir .= ", $img5";
        }
        if(isset($_POST["img6"])) {
            $inserir .= ", $img";
        }
        $inserir .= ") ";

        $operacao_inserir = mysqli_query($conect, $inserir);

        if (!$operacao_inserir){
            die("Erro no Banco");
        } else {
            $msg = "Operção feita com sucesso";
        }
    }

    //Seleção de produtoID
    $select_produto = "SELECT produtoID, nomeProduto ";
    $select_produto .= " FROM produtos ";

    $lista_produto = mysqli_query($conect, $select_produto);

    if (!$lista_produto){
        die("Falha na consulta ao banco de dados");
    }

    //Seleção de estados
    $select_estados = "SELECT categoriaID, nomeCategoria ";
    $select_estados .= " FROM categorias ";

    $lista_categoria = mysqli_query($conect, $select_estados);

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
            input, textarea{
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
                <form action="inserir_detalhe.php" method="post" enctype="multipart/form-data">

                    <select name="produto">
                        <?php
                            while ($linha = mysqli_fetch_assoc($lista_produto)) {
                        ?>
                            <option value="<?php echo $linha["produtoID"]; ?>"> 
                                <?php echo $linha["nomeProduto"]; ?> 
                            </option>
                        <?php
                            }
                        ?>
                    </select>

                    <textarea name="descricao" cols="70" rows="5" placeholder="Descrição do Produto"></textarea>
                    <input type="text" name="cor" placeholder="Cor">
                    <input type="number" name="estoque" placeholder="Estoque">

                    <input type="hidden" name="MAX_FILE_SIZE" value="30000000"> 

                    <input type="file" name="imgPrincipal">
                        <span>
                            <?php
                                if( isset($mensagem1) ) {
                                    echo $mensagem1;
                                }    
                            ?>
                        </span>

                    <input type="file" name="img2">
                        <span>
                            <?php
                                if( isset($mensagem2) ) {
                                    echo $mensagem2;
                                }    
                            ?>
                        </span>

                    <input type="file" name="img3">
                        <span>
                            <?php
                                if( isset($mensagem3) ) {
                                    echo $mensagem3;
                                }    
                            ?>
                        </span>

                    <input type="file" name="img4">
                        <span>
                            <?php
                                if( isset($mensagem4) ) {
                                    echo $mensagem4;
                                }    
                            ?>
                        </span>

                    <input type="file" name="img5">
                        <span>
                            <?php
                                if( isset($mensagem5) ) {
                                    echo $mensagem5;
                                }    
                            ?>
                        </span>

                    <input type="file" name="img6">
                        <span>
                            <?php
                                if( isset($mensagem6) ) {
                                    echo $mensagem6;
                                }    
                            ?>
                        </span>
                        
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
                    if( isset($msg) ) {
                        echo $msg; 
                    } 
                ?>
            </div>
        </main>
    </body>
</html>

<?php
    mysqli_close($conect);
?>
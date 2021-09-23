<?php require_once("../../conexao/conexao.php");

    session_start();

    //Seleção de estado
    $selectEstado = "SELECT * FROM estados";

    $listaEstado = mysqli_query($conect, $selectEstado);

    if (!$listaEstado) {
        die("Falha na consulta dos estados");
    }

    //Inserção de novo usuario - Cadastre-se
    if (isset($_POST["email"])) {
        $nome           = $_POST["nome"];
        $email          = $_POST["email"];
        $usuario        = $_POST["usuario"];
        $senha          = $_POST["senha"];
        $nivel          = $_POST["nivel"];
        $ddd            = $_POST["ddd"];
        $celular        = $_POST["celular"];
        $cep            = $_POST["cep"];
        $estado         = $_POST["estado"];
        $cidade         = $_POST["cidade"];
        $endereco       = $_POST["endereco"];
        $numero         = $_POST["numero"];
        if (isset($_POST["complemento"])){
            $complemento = $_POST["complemento"];
        }

        $novoUsuario  = "INSERT INTO usuarios ";
        $novoUsuario .= " (nome, email, ddd, celular, cep, estadoID, cidade, endereco, numero, usuario, senha, nivel ";
        if (isset($complemento)){
            $novoUsuario .= ", complemento ";
        }
        $novoUsuario .= " ) VALUES "; 
        $novoUsuario .= " ('$nome', '$email', '$ddd', '$celular', '$cep', $estado, '$cidade', '$endereco', '$numero', '$usuario', '$senha', '$nivel' ";
        if (isset($complemento)){
            $novoUsuario .= " , '$complemento' ";
        }
        $novoUsuario .= " ) "; 

        $inserirUsuario = mysqli_query($conect, $novoUsuario);
        if(!$inserirUsuario){
            die("Erro no cadastro");
        } else {
            $selectUser = "SELECT * FROM usuarios WHERE email = '{$email}' ";
            $listaUser = mysqli_query($conect, $selectUser);
            if(!$listaUser){
                die("Erro no login");
            }
            $dadosUsuario = mysqli_fetch_assoc($listaUser);
            $_SESSION["userKamys"] = $dadosUsuario;  
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
    <link rel="stylesheet" type="text/css" href="cadastro.css">
    <!-- Fontes -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,700;1,500&display=swap" rel="stylesheet">
    <!-- Infos -->
    <link rel='icon' type='image/png' href="../images/outras/icone.png">
    <title>Kamy's Store</title>
    <!-- Scripts -->
    <script src="../_assets/files/jquery-3.6.0.min.js"></script>
</head>

<body>

    <nav class="navbar bg-white position-fixed w-100 p-0">
        <div class="container-fluid">
            <div class="divLogo w-100">
                <a href="../index/index.php" class="d-flex align-items-center h-100 mx-auto">
                    <img class="logo" src="../images/outras/logoPNG.png">
                </a>
            </div>
        </div>
    </nav>

    <main class="container w-75">
        <h1>Cadastre-se</h1>
        <form action="cadastro.php" method="POST" class="row g-3 needs-validation mt-3" id="cadastrar" novalidate>
            <div class="col-md-6 mb-1 d-flex flex-column"> <!----- NOME ----->
                <label for="validationCustom01" class="form-label mb-1">Nome *</label>
                <label class="name-label d-inline-flex">
                    <input name="nome" type="text" class="form-control nome" id="validationCustom01" placeholder="Insira seu nome" required>
                    <svg onmouseover="$('#verificaNome').html('Insira um nome válido.');" onmouseleave="$('#verificaNome').html('');" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-exclamation-circle my-auto icon icon-nome" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                    </svg>
                </label>
                <div class="ms-1" id="verificaNome" style="height: 15px; font-size:14px; color: red;"></div>
            </div>

            <div class="col-md-6 mb-1 d-flex flex-column"> <!----- E-MAIL ----->
                <label for="validationCustom02" class="form-label mb-1">E-mail *</label>
                <label class="name-label d-inline-flex">
                    <input name="email" type="text" class="form-control email" id="validationCustom02" minlength="10" placeholder="exemplo@email.com.br" required>
                    <svg onmouseover="$('#verificaEmail').html('Insira um e-mail válido.');" onmouseleave="$('#verificaEmail').html('');" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-exclamation-circle my-auto icon icon-email" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                    </svg>
                </label>
                <div class="ms-1" id="verificaEmail" style="height: 15px; font-size:14px; color: red;"></div>
            </div>

            <div class="col-md-3 mb-1 d-flex flex-column"> <!----- NOME DE USUARIO ----->
                <label for="validationCustom03" class="form-label mb-1">Username *</label>
                <label class="name-label d-inline-flex">
                    <input name="usuario" type="text" class="form-control usuario" id="validationCustom03" minlength="2" required>
                    <svg onmouseover="$('#verificaUsuario').html('Insira um nome de usuário válido.');" onmouseleave="$('#verificaUsuario').html('');" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-exclamation-circle my-auto icon icon-usuario" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                    </svg>
                </label>
                <div class="ms-1" id="verificaUsuario" style="height: 15px; font-size:14px; color: red;"></div>
            </div>

            <div class="col-md-4 mb-1 d-flex flex-column"> <!----- SENHA ----->
                <label for="validationCustom04" class="form-label name-label mb-1">
                    Senha *
                    <svg onmouseover="$('#verificaSenha').html('Insira uma senha com no mínimo 6 caracteres.');" onmouseleave="$('#verificaSenha').html('');" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-exclamation-circle my-auto icon icon-senha" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                    </svg>
                </label>
                <div class="input-group">
                    <input name="senha" type="password" class="form-control senha" id="validationCustom04" maxlength="20" minlength="6" aria-label="Recipient's username" aria-describedby="button-addon2" required>
                    <button class="btn btn-outline mostrar" type="button" id="button-addon2">Mostrar</button>
                </div>
                <div class="ms-1" id="verificaSenha" style="height: 15px; font-size:12px; color: red;"></div>
            </div>

            <div class="col-md-2 mb-1 d-flex flex-column"> <!----- DDD ----->
                <label for="validationCustom05" class="form-label mb-1">DDD *</label>
                <label class="name-label d-inline-flex">
                    <input name="ddd" type="text" class="form-control ddd" id="validationCustom05" onkeypress="$(this).mask('(000)');" placeholder="(012)" required>
                    <svg onmouseover="$('#verificaDDD').html('Insira um DDD válido.');" onmouseleave="$('#verificaDDD').html('');" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-exclamation-circle my-auto icon icon-ddd" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                    </svg>
                </label>
                <div class="ms-1" id="verificaDDD" style="height: 15px; font-size:14px; color: red;"></div>
            </div>

            <div class="col-md-3 mb-1 d-flex flex-column"> <!----- CELULAR ----->
                <label for="validationCustom06" class="form-label mb-1">Celular *</label>
                <label class="name-label d-inline-flex">
                    <input name="celular" type="text" class="form-control celular" id="validationCustom06" onkeypress="$(this).mask('0 0000-0000');" placeholder="9 1234-5678" required>
                    <svg onmouseover="$('#verificaCelular').html('Insira um número de celular válido.');" onmouseleave="$('#verificaCelular').html('');" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-exclamation-circle my-auto icon icon-celular" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                    </svg>
                </label>
                <div class="ms-1" id="verificaCelular" style="height: 15px; font-size:14px; color: red;"></div>
            </div>

            <div class="col-md-2 mb-1 d-flex flex-column"> <!----- CEP ----->
                <label for="validationCustom07" class="form-label mb-1">CEP *</label>
                <label class="name-label d-inline-flex">
                    <input name="cep" type="text" class="form-control cep" id="validationCustom07" onkeypress="$(this).mask('00000-000');" placeholder="12345-678" required>
                    <svg onmouseover="$('#verificaCEP').html('Insira um CEP válido.');" onmouseleave="$('#verificaCEP').html('');" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-exclamation-circle my-auto icon icon-cep" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                    </svg>
                </label>
                <div class="ms-1" id="verificaCEP" style="height: 15px; font-size:14px; color: red;"></div>
            </div>

            <div class="col-md-3 mb-1"> <!----- ESTADO ----->
                <label for="validationCustom08" class="form-label name-label mb-1 w-100">
                    Estado *
                    <svg onmouseover="$('#verificaEstado').html('Marque seu estado.');" onmouseleave="$('#verificaEstado').html('');" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-exclamation-circle my-auto icon icon-estado" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                    </svg>
                </label>
                <select name="estado" class="form-select estado" id="validationCustom08" required>
                    <option selected disabled value="">Selecione</option>
                    <?php
                    while ($linhaEstado = mysqli_fetch_assoc($listaEstado)) {
                    ?>
                        <option value="<?php echo $linhaEstado["sigla"] ?>">
                            <?php echo $linhaEstado["nome"]; ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
                <div class="ms-1" id="verificaEstado" style="height: 15px; font-size:14px; color: red;"></div>
            </div>

            <div class="col-md-3 mb-1 d-flex flex-column"> <!----- CIDADE ----->
                <label for="validationCustom09" class="form-label mb-1">Cidade *</label>
                <label class="name-label d-inline-flex">
                    <input name="cidade" type="text" class="form-control cidade" id="validationCustom09" required>
                    <svg onmouseover="$('#verificaCidade').html('Insira uma cidade válida.');" onmouseleave="$('#verificaCidade').html('');" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-exclamation-circle my-auto icon icon-cidade" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                    </svg>
                </label>
                <div class="ms-1" id="verificaCidade" style="height: 15px; font-size:14px; color: red;"></div>
            </div>

            <div class="col-md-4 mb-1 d-flex flex-column"> <!----- ENDEREÇO ----->
                <label for="validationCustom10" class="form-label mb-1">Endereço *</label>
                <label class="name-label d-inline-flex">
                    <input name="endereco" type="text" class="form-control endereco" id="validationCustom10" required>
                    <svg onmouseover="$('#verificaEndereco').html('Insira um endereço válido.');" onmouseleave="$('#verificaEndereco').html('');" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-exclamation-circle my-auto icon icon-cidade" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                    </svg>
                </label>
                <div class="ms-1" id="verificaEndereco" style="height: 15px; font-size:14px; color: red;"></div>
            </div>

            <div class="col-md-2 d-flex flex-column"> <!----- NÚMERO ----->
                <label for="validationCustom11" class="form-label name-label mb-1">
                    Número *
                    <svg onmouseover="$('#verificaNumero').html('Insira um número válido.');" onmouseleave="$('#verificaNumero').html('');" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-exclamation-circle my-auto icon icon-numero" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                    </svg>
                </label>
                <input name="numero" type="number" class="form-control numero" id="validationCustom11" required>
                <div class="ms-1" id="verificaNumero" style="height: 15px; font-size:12px; color: red;"></div>
            </div>

            <div class="col-md-3 d-flex flex-column"> <!----- COMPLEMENTO ----->
                <label for="validationCustom12" class="form-label mb-1">Complemento</label>
                <input name="complemento" type="text" class="form-control complemento" id="validationCustom12">
            </div>

            <input type="hidden" value="user" class="nivel" name="nivel">

            <div class="col-12 mb-2">
                <button class="btn btn-outline w-50 mx-auto d-block mt-3 criar" type="submit">Criar conta</button>
            </div>
        </form>
    </main>

    <script src="cadastro.js"></script>
    <script src="validation.js"></script>
    <script src="estado.js"></script>
    <script src="../_assets/files/validator.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
<?php mysqli_close($conect); ?>
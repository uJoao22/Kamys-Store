<?php
    session_start();
    if (isset($_POST["usuario"])) {
        $usuario    = $_POST["usuario"];
        $senha      = $_POST["senha"];

        $login = "SELECT usuarioID, nome, usuario, senha, nivel FROM usuarios ";
        $login .= " WHERE (usuario = '{$usuario}' and senha = '{$senha}') or (email = '{$usuario}' and senha = '{$senha}')";
        $acesso = mysqli_query($conect, $login);
        if (!$acesso) {
            die ("Falha no login");
        }
        $informacao = mysqli_fetch_assoc($acesso);
        if(empty($informacao)) {
            $loginInvalido = "<div class=''>";
            $loginInvalido .= "<svg xmlns='http://www.w3.org/2000/svg' style='display: none;'>";
            $loginInvalido .= "<symbol id='exclamation-triangle-fill' fill='currentColor' viewBox='0 0 16 16'>";
            $loginInvalido .= "<path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>";
            $loginInvalido .= "</symbol></svg>";
            $loginInvalido .= "<div class='alert alert-danger alert-dismissible fade show p-1 mb-1 mt-3' role='alert'>";
            $loginInvalido .= "<svg class='bi flex-shrink-0' width='20' height='20' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>";
            $loginInvalido .= "<strong class='ms-1' style='font-size: 15px;'>Login Inválido.</strong>";
            $loginInvalido .= "<button type='button' class='btn-close h-auto py-3 px-1' data-bs-dismiss='alert' aria-label='Close'></button>";
            $loginInvalido .= "</div></div>";
        } else {
            $_SESSION["userKamys"] = $informacao;            
            if ($_SESSION["userKamys"]["nivel"] == "admin"){
                header("location: ../administrador/admin.php");
            } else {
                header("location: ../conta/conta.php?c=1");
            }
        }
    }

    //Seleção de categoria
    $select_categoria = "SELECT categoriaID, nomeCategoria ";
    $select_categoria .= " FROM categorias ";

    $lista_categoria = mysqli_query($conect, $select_categoria);

    if (!$lista_categoria) {
        die("Falha na consulta ao banco de dados");
    }
?>

<!-- MENU DESKTOP -->
<nav class="navbar navbar-expand-lg bg-white position-fixed w-100" id="menuDesktop">
    <div class="container-fluid row">

        <div class="d-flex align-items-center col-lg-4 col-md-4 col-sm-4 col-3">
            <a>
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="black" class="bi bi-list menuBarra" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
            </a>

            <form action="index.php" method="get" id="formPesquisa" class="ms-2 d-flex align-items-center">
                <button type="submit" name="botaoPesquisa" id="lupa">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="20" fill="rgba(0, 0, 0, 0.7)" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </button>

                <input type="text" id="pesquisa" class="ms-1" name="pesquisa" placeholder="O que você deseja?">
            </form>
        </div>

        <div class="divLogo col-lg-7 col-md-7 col-sm-7 col-8 ">
            <a href="../index/index.php" class="d-flex align-items-center h-100 ms-5">
                <img class="logo" src="../images/outras/logoPNG.png">
            </a>
        </div>

        <div class="d-flex justify-content-end col-lg-1 col-md-1 col-sm-1 col-1">
            <a href="">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="rgba(0, 0, 0, 0.7)" class="bi bi-basket me-3" viewBox="0 0 16 16">
                    <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z" />
                </svg>
            </a>

            <?php if (isset($_SESSION["userKamys"])) { 
                    if ($_SESSION["userKamys"]["nivel"] == "admin"){
            ?>
                <a href="../administrador/admin.php">
            <?php } else { ?>
                <a href="../conta/conta.php?c=1">
            <?php } ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="rgba(0, 0, 0, 0.8)" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                    </svg>
                </a>
            <?php } else { ?>
                <div class="dropdown"> <!-- LOGIN -->
                    <button class="botaoLogin" type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="rgba(0, 0, 0, 0.8)" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end p-2 mt-1">
                        <h5>Login</h5>
                        <form action="index.php" method="post" class="formLogin">
                            <input type="text" name="usuario" class="form-control my-3 p-1" placeholder="Usuário ou E-mail" aria-label="Usuário" aria-describedby="addon-wrapping">
                            <input type="password" name="senha" class="form-control my-3 p-1" placeholder="Senha" aria-label="Senha" aria-describedby="addon-wrapping">
                            <a class="cadastro" href="../cadastro/cadastro.php">Cadastre-se</a>
                            <button class="btn btn-outline btn-sm float-end logar">Entrar</button>
                        </form>

                    <?php if (isset($loginInvalido)) {
                        echo $loginInvalido;
                    }?>

                    </ul>
                </div>
            <?php } ?>
        </div>

    </div>
</nav>

<!-- MENU MOBILE -->
<nav class="navbar navbar-expand-lg bg-white position-fixed w-100" id="menuMobile">
    <div class="container-fluid d-flex flex-column">

        <div class="d-flex align-items-center justify-content-between w-100">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="rgba(0, 0, 0, 0.8)" class="bi bi-list menuBarra" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
            </svg>


            <div class="dados d-flex">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="rgba(0, 0, 0, 0.8)" class="bi bi-basket me-1" viewBox="0 0 16 16">
                        <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z" />
                    </svg>
                </a>

                <?php if (isset($_SESSION["userKamys"])) { 
                        if ($_SESSION["userKamys"]["nivel"] == "admin"){
                ?>
                    <a href="../administrador/admin.php">
                <?php } else { ?>
                    <a href="../conta/conta.php?c=1">
                <?php } ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="rgba(0, 0, 0, 0.8)" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                    </a>
                <?php } else { ?>
                    <div class="dropdown"> <!-- LOGIN -->
                        <button class="botaoLogin" type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="rgba(0, 0, 0, 0.8)" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end p-2 mt-1">
                            <h5>Login</h5>
                            <form action="index.php" method="post" class="formLogin">
                                <input type="text" name="usuario" class="form-control my-3 p-1" placeholder="Usuário ou E-mail" aria-label="Usuário" aria-describedby="addon-wrapping">
                                <input type="password" name="senha" class="form-control my-3 p-1" placeholder="Senha" aria-label="Senha" aria-describedby="addon-wrapping">
                                <a class="cadastro" href="../cadastro/cadastro.php">Cadastre-se</a>
                                <button class="btn btn-outline btn-sm float-end logar">Entrar</button>
                            </form>

                        <?php if (isset($loginInvalido)) {
                            echo $loginInvalido;
                        }?>

                        </ul>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="divLogo d-flex justify-content-center align-items-center w-75">
            <a href="../index/index.php" class="h-100">
                <img class="logo h-100" src="../images/outras/logoPNG.png">
            </a>
        </div>

        <form action="index.php" method="get" id="formPesquisa" class="d-flex align-items-center w-100">
            <button name="botaoPesquisa" id="lupa">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="20" fill="rgba(0, 0, 0, 0.7)" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg>
            </button>

            <input type="text" id="pesquisa" class="ms-1" name="pesquisa" placeholder="O que você deseja?">
        </form>

    </div>
</nav>

<!-- DROPDOW LATERAL -->
<div class="dropLateral h-100 position-fixed bg-white"> 
    <div class="h-100 w-100 d-flex flex-column align-items-center">
        <div class="w-100">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="rgba(0, 0, 0, 0.7)" class="bi bi-x-lg float-end mt-2 me-2 xClose" viewBox="0 0 16 16">
                <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z" />
            </svg>
        </div>

        <div class="category w-75 d-flex justify-content-center align-items-center">
            <ul class="d-flex flex-column align-items-center">
                <a href="index.php"> 
                    <li>Produtos</li>
                </a>

                <?php
                    while ($linhaCategoria = mysqli_fetch_assoc($lista_categoria)) {
                ?>
                    <a href="index.php?codigo=<?php echo $linhaCategoria['categoriaID'] ?>">
                        <li> 
                            <?php echo $linhaCategoria["nomeCategoria"]; ?>
                        </li>
                    </a>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</div>
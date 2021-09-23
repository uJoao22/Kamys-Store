<!-- MENU DESKTOP -->
<div id="menuDesktop" class="h-100 navbar flex-column align-items-center justify-content-around p-2 position-fixed bg-white">
    <a class="w-100" href="../index/index.php"> 
        <img class="w-75 d-block mx-auto" src="../images/outras/logoPNG.png"> 
    </a>

    <ul class="m-0 p-0 w-100 mb-5 list-group">
        <?php
        $ativo = 'style="background-color: rgb(163, 116, 194);"';
        $active = 'style="font-weight: bold;"';
        ?>
        <li class="nav-item my-1 text-center" <?php if ($info == 1) { echo $ativo; } ?>> 
            <a class="nav-link text-white" href="conta.php?c=1" <?php if ($info == 1) { echo $active; } ?>>
                Informações Pessoais
            </a>
        </li>

        <li class="nav-item my-1 text-center" <?php if ($info == 2) { echo $ativo; } ?>> 
            <a class="nav-link text-white" href="conta.php?c=2" <?php if ($info == 2) { echo $active; } ?>>
                Dados de envio
            </a>
        </li>

        <li class="nav-item my-1 text-center" <?php if ($info == 3) { echo $ativo; } ?>> 
            <a class="nav-link text-white" href="conta.php?c=3" <?php if ($info == 3) { echo $active; } ?>>
                Dados da conta
            </a>
        </li>

        <li class="nav-item my-1 text-center" <?php if ($info == 4) { echo $ativo; } ?>>
            <a class="nav-link text-white" href="conta.php?c=4" <?php if ($info == 4) { echo $active; } ?>>
                Pedidos
            </a>
        </li>
        <li class="nav-item my-1 text-center"><a class="nav-link text-white sair" href="sair.php" class="">Sair</a></li>
    </ul>
</div>


<!-- MENU MOBILE -->
<div id="menuMobile" class="w-100 p-0 position-fixed bg-white">

        <div class="ms-2" style="width: 35px; height: 35px"></div>

        <a class="mx-auto aLogo" href="../index/index.php"> 
            <img class="d-block mx-auto w-100" src="../images/outras/logoPNG.png" style="width: 85%;"> 
        </a>

        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="black" class="bi bi-list my-auto me-2" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
        </svg>
</div>

<ul class="w-100 list-group list-Mobile">
        <?php
        $ativo = 'style="background-color: rgb(163, 116, 194);"';
        $active = 'style="font-weight: bold;"';
        ?>
        <li class="nav-item my-1 text-center w-75 mx-auto" <?php if ($info == 1) { echo $ativo; } ?>> 
            <a class="nav-link text-white" href="conta.php?c=1" <?php if ($info == 1) { echo $active; } ?>>
                Informações Pessoais
            </a>
        </li>

        <li class="nav-item my-1 text-center w-75 mx-auto" <?php if ($info == 2) { echo $ativo; } ?>> 
            <a class="nav-link text-white" href="conta.php?c=2" <?php if ($info == 2) { echo $active; } ?>>
                Dados de envio
            </a>
        </li>

        <li class="nav-item my-1 text-center w-75 mx-auto" <?php if ($info == 3) { echo $ativo; } ?>> 
            <a class="nav-link text-white" href="conta.php?c=3" <?php if ($info == 3) { echo $active; } ?>>
                Dados da conta
            </a>
        </li>

        <li class="nav-item my-1 text-center w-75 mx-auto" <?php if ($info == 4) { echo $ativo; } ?>>
            <a class="nav-link text-white" href="conta.php?c=4" <?php if ($info == 4) { echo $active; } ?>>
                Pedidos
            </a>
        </li>
        <li class="nav-item my-2 text-center w-75 mx-auto"><a class="nav-link text-white sair" href="sair.php" class="">Sair</a></li>
    </ul>
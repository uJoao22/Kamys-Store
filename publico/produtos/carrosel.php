<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators w-50 mx-auto px-1" style="margin-bottom: 1%; z-index: 0;">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <?php
        if (isset($dadosDetalhe["img3"])) {
        ?>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <?php } ?>

        <?php
        if (isset($dadosDetalhe["img4"])) {
        ?>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 4"></button>
        <?php } ?>

        <?php
        if (isset($dadosDetalhe["img5"])) {
        ?>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4" aria-label="Slide 5"></button>
        <?php } ?>

        <?php
        if (isset($dadosDetalhe["img6"])) {
        ?>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="5" aria-label="Slide 6"></button>
        <?php } ?>
    </div>
    <div class="carousel-inner" style="z-index: -1;">
        <div class="carousel-item active">
            <img src="<?php echo "../" . $dadosDetalhe["imgPrincipal"] ?>" class="d-block w-100" alt="<?php echo $nomeProduto ." - ". $dadosDetalhe["cor"] ?>">
        </div>

        <div class="carousel-item">
            <img src="<?php echo "../" . $dadosDetalhe["img2"] ?>" class="d-block w-100" alt="<?php echo $nomeProduto ." - ". $dadosDetalhe["cor"] ?>">
        </div>

        <?php
        if (isset($dadosDetalhe["img3"])) {
        ?>
            <div class="carousel-item">
                <img src="<?php echo "../" . $dadosDetalhe["img3"] ?>" class="d-block w-100" alt="<?php echo $nomeProduto ." - ". $dadosDetalhe["cor"] ?>">
            </div>
        <?php } ?>

        <?php
        if (isset($dadosDetalhe["img4"])) {
        ?>
            <div class="carousel-item">
                <img src="<?php echo "../" . $dadosDetalhe["img4"] ?>" class="d-block w-100" alt="<?php echo $nomeProduto ." - ". $dadosDetalhe["cor"] ?>">
            </div>
        <?php } ?>

        <?php
        if (isset($dadosDetalhe["img5"])) {
        ?>
            <div class="carousel-item">
                <img src="<?php echo "../" . $dadosDetalhe["img5"] ?>" class="d-block w-100" alt="<?php echo $nomeProduto ." - ". $dadosDetalhe["cor"] ?>">
            </div>
        <?php } ?>

        <?php
        if (isset($dadosDetalhe["img6"])) {
        ?>
            <div class="carousel-item">
                <img src="<?php echo "../" . $dadosDetalhe["img6"] ?>" class="d-block w-100" alt="<?php echo $nomeProduto ." - ". $dadosDetalhe["cor"] ?>">
            </div>
        <?php } ?>


    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev" style="z-index: 0;">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next" style="z-index: 0;">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
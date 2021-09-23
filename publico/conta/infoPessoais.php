<div class="p-3 row w-100 mx-auto">
    <h2 class="col-md-7 mx-auto text-center rounded-pill text-white py-1 mb-4 titulo">Informação Pessoais</h2>

    <div class="col-md-7 mx-auto">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-fill float-end" viewBox="0 0 16 16">
            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg float-end" viewBox="0 0 16 16">
            <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z" />
        </svg>
    </div>

    <form class="p-0" action="conta.php" method="post">
        <div class="col-md-7 my-4 mx-auto">
            <label for="inputName" class="form-label mb-1 d-block"><b>Nome:</b></label>
            <input type="text" value="<?php echo $nome ?>" class="w-100 p-1 ps-2" id="inputName" name="nome" readonly='readonly' />
        </div>

        <div class="col-md-7 my-4 mx-auto">
            <label for="inputEmail" class="form-label mb-1 d-block"><b>E-mail:</b></label>
            <input type="text" value="<?php echo $email ?>" class="w-100 p-1 ps-2" id="inputEmail" name="email" readonly='readonly' />
            <div class="w-100 text-danger ms-2" style="height: 14px; font-size:14px;" id="verificationEmail"></div>
        </div>

        <div class="row mx-auto col-md-7 my-4">
            <div class="col-md-4">
                <label for="inputDDD" class="form-label mb-1 d-block"><b>DDD:</b></label>
                <input type="text" value="<?php echo "(" . $ddd . ")" ?>" class="w-100 p-1 ps-2" id="inputDDD" name="ddd" readonly='readonly' onkeypress="$(this).mask('(000)');" />
            </div>

            <div class="col-md-8">
                <label for="inputCelular" class="form-label mb-1 d-block"><b>Celular:</b></label>
                <input type="text" value="<?php echo $celular ?>" class="w-100 p-1 ps-2" id="inputCelular" name="celular" readonly='readonly' onkeypress="$(this).mask('00000-0000');" />
            </div>
        </div>

        <button type="button" class="btn btn-outline-light mx-auto save saveInfo w-50 mt-4">Salvar</button>
    </form>
</div>
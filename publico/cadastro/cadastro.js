(function () {
    'use strict'

    var forms = document.querySelectorAll('.needs-validation')

    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
})();

$('.cep').blur(function (e) {
    let cep = $('.cep').val();
    let url = "https://viacep.com.br/ws/" + cep + "/json";

    let validacep = /^[0-9]{5}-?[0-9]{3}$/;
    if (validacep.test(cep)) {
        pesquisarCEP(url);
    } 
});

function pesquisarCEP(endereco) {
    $.ajax({
        type: "GET",
        url: endereco,
        async: false
    }).done(function (data) {
        $('.estado').val(data.uf);
            let sigla = data.uf;
            sigla = formatarEstado(sigla);
            if (sigla.length == 1 || sigla.length == 2) {
                validation.estado = sigla;
                console.log(validation);
            } else {
                delete validation.estado;
                console.log(validation);
            }
            
        $('.cidade').val(data.localidade);
            let city = data.localidade;
            if (city.length >= 1); {
                validation.cidade = city;
                console.log(validation);
            }
            if (city.length < 1) {
                delete validation.cidade;
                console.log(validation);
            }

        $('.endereco').val(data.logradouro);
            let end = data.logradouro;
            if (end.length >= 1); {
                validation.endereco = end;
                console.log(validation);
            }
            if (end.length < 1) {
                delete validation.endereco;
                console.log(validation);
            }
    }).fail(function () {
        console.log("Erro");
    });
}

let senha = $('.senha');
let mostrar = $(".mostrar");

mostrar.mousedown(function () {
    senha.attr("type", "text");
});

mostrar.mouseup(function () {
    senha.attr("type", "password");
});
$(".mostrar").mouseout(function () {
    $(".senha").attr("type", "password");
});
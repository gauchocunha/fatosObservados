//Carrega os formularios conforme os cliques
//no menu dentro de uma div chamada result
function carregaPagina(url) {
    $("#result").fadeOut('2000', function () {
        $('#resul').html('');
        $("#result").load(url, function () {
            $("#result").fadeIn('2000');
            //$('#acesso').focus();
            $('.vm').css('color', 'red');
            $('.date').mask('99/99/9999');
            $('.fone').mask('(00) 0000-0000');
            $('.cep').mask('00.000-000');
            $('.mcpf').mask('000.000.000-00', {reverse: true});
            $('.cnpj').mask('99.999.999/9999-99');
            $('.valor').mask('000.000.000.000.000,00', {reverse: true});
            
                $('.tabula').on('keypress', function (event) {
                    if (event.which === 13) {
                        var index = $('.tabula').index(this) + 1;
                        $('.tabula').eq(index).focus();
                    }
                });

        });
    });
}

//Mostra as mensagens de erro quando os dados não passarem
//na validação do laravel ou no perfil de acesso
function erro(data) {
    if (data.status == 403) {
        swal({
            title: "Acesso não autorizado!",
            text: "Se você necessita realmente realizar esse procedimento,  solicite alteração do seu perfil ao administrador do sistema.",
            icon: "warning",
            button: "Ok!"
        });
        carregaPagina('/naoAutorizado');
    } else if (data.status == 500) {

        swal({
            title: "Não é possível realizar a operação!",
            text: "Se você está adicionando um novo registro é possível que ele seja duplicado. Se está excluindo provavelmente existem registros relacionados em outras partes da aplicação que devem  ser excluídos ou modificados primeiro.",
            icon: "warning",
            button: "Ok!"
        });

    } else if (data.status == 404) {

        swal({
            title: "Registro não encontrado!",
            text: "Não foi encontrado nenhum registro que atenda ao critério especificado.",
            icon: "warning",
            button: "Ok!"
        });

    } else {
        var text = '';
        $.each(data.responseJSON.errors, function (key, val) {
            text += val + '\n';
        });
        swal({
            title: "Dados inválidos!",
            text: text,
            icon: "error",
            button: "Ok!"
        });
    }
}

//Roda quando o usuario faz uma operação
//inválida como clicar em um botão de busca
//sem passar um valorpara buscar
function operacaoInvalida(texto) {
    swal({
        title: "Operação inválida!",
        text: texto + "!",
        icon: "warning",
        button: "Ok!"
    });
}

//Roda quando não localiza nenhum registro
function registroNaoEncontrado() {
    swal({
        title: "Registro não encontrado!",
        text: "Não foi localizado nenhum registro que atenda ao critério especificado!",
        icon: "warning",
        button: "Ok!"
    });
}

//Desabilita os botões do menu do formulario (normalmente quando não tem nada sendo editado)
function desabilitaMenuFormulario() {
    $('.menuFormulario').each(
            function () {
                $(this).attr('disabled', 'disabled');
            }
    );
}

//Inverso da função anterior, habilita os botões quando há um registro salvo ou em edição
function habilitaMenuFormulario() {
    $('.menuFormulario').each(
            function () {
                $(this).removeAttr('disabled');
            }
    );
}

//Preenche um formulario através de um array json
function preencheFormulario(formulario, jsonData) {
//Variavel para capturar o tipo do elemento
    var tipo = "";
//Captura o nome do elemento atual
    var chave = "";
//Vai guardar o id do elemento
    var id = "";
//Vai armazenar o que vier nos dados
    var valor = "";
    $("#" + formulario + " :input").each(function () {
        tipo = $(this).prop('type');
        chave = $(this).attr('name');
        id = $(this).attr('id');
        valor = jsonData[chave];
        switch (tipo) {
            case 'hidden':
                if (chave != '_token') {
                    $(this).val(valor);
                }
                break;
            case 'text':
                $(this).val(valor);
                break;
            case 'textarea':
                $(this).val(valor);
                break;
            case 'email':
                $(this).val(valor);
                break;
            case 'select-one':
                var combo = document.getElementById(id);
                for (i = 0; i < combo.length; i = i + 1) {
                    if (combo.options[i].value == valor) {
                        combo.selectedIndex = combo.options[i].index;
                    }
                }
                break;
        }
    });
}

function selecionaCombo(id, valor) {
    var combo = document.getElementById(id);
    for (i = 0; i < combo.length; i = i + 1) {
        if (combo.options[i].value == valor) {
            combo.selectedIndex = combo.options[i].index;
        }
    }
}

//Esvazia um formulário zerando os campos menos o token
function limpaFormulario(formulario) {
    var tipo = "";
    var chave = "";
    var id = "";
    $("#" + formulario + " :input").each(function () {
        tipo = $(this).prop('type');
        chave = $(this).attr('name');
        id = $(this).attr('id');
        switch (tipo) {
            case 'hidden':
                if (chave != '_token') {
                    $(this).val('');
                }
                break;
            case 'text':
                $(this).val('');
                break;
            case 'password':
                $(this).val('');
                break;
            case 'textarea':
                $(this).val('');
                break;
            case 'email':
                $(this).val('');
                break;
            case 'select-one':
                var combo = document.getElementById(id);
                combo.selectedIndex = 0;
                combo.options[combo.selectedIndex].text = 'Selecione...';
                combo.options[combo.selectedIndex].value = '';
        }
    });
}

//prepara para um novo registro
function novo1(formulario) {
    limpaFormulario(formulario);
    desabilitaMenuFormulario();
    $("#busca").html('');
    $("#nome").focus();
}

function vm() {
    $(".vm").css('color', '#F00');
}

function validaCPF(cpf) {
    if (cpf !== undefined) {
        var valido = true;
        cpf = cpf.replace(/[^\d]+/g, '');
        if (cpf === '') {
            valido = false;
        }

        // Elimina CPFs invalidos conhecidos
        if (cpf.length !== 11
                || cpf === "00000000000"
                || cpf === "11111111111"
                || cpf === "22222222222"
                || cpf === "33333333333"
                || cpf === "44444444444"
                || cpf === "55555555555"
                || cpf === "66666666666"
                || cpf === "77777777777"
                || cpf === "88888888888"
                || cpf === "99999999999") {
            valido = false;
        }
        // Valida 1o digito
        add = 0;
        for (i = 0; i < 9; i++) {
            add += parseInt(cpf.charAt(i)) * (10 - i);
        }
        rev = 11 - (add % 11);
        if (rev === 10 || rev === 11) {
            rev = 0;
        }
        if (rev !== parseInt(cpf.charAt(9))) {
            valido = false;
        }
        // Valida 2o digito
        add = 0;
        for (i = 0; i < 10; i++) {
            add += parseInt(cpf.charAt(i)) * (11 - i);
        }
        rev = 11 - (add % 11);
        if (rev === 10 || rev === 11) {
            rev = 0;
        }
        if (rev !== parseInt(cpf.charAt(10))) {
            valido = false;
        }
        return valido;
    }
}


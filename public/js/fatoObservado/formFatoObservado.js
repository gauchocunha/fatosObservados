//salva um fato observado
function salvar(n) {
    $.ajax({
        url: '/fatoObservado/salvar',
        type: 'POST',
        data: $('#formFatoObservado').serialize(),
        success: function (data) {
            if (data.id) {
                $('#id').val(data.id);
                swal({
                    title: "Bom trabalho!",
                    text: "O registro foi salvo com sucesso!",
                    icon: "success",
                    button: "Ok!"
                });
                //caso for passado o numero 1 ele salva e vai para um novo registro
                if (n === 1) {
                    novo();
                }
            }
        },
        error: function (data) {
            erro(data);
        }
    });
}
//preenche a caixa numero quando seleciona um estudante
$('#idEstudante').change(function () {
    $.ajax({
        url: '/fatoObservado/retornarNumero',
        type: 'POST',
        data: $('#formFatoObservado').serialize(),
        success: function (data) {
            $('#numero').val(data);
        },
        error: function (data) {
            erro(data);
        }
    });
});
//seleciona a combo estudante quando preenche um número
$('#numero').change(function () {
    if ($('#numero').val()) {
        $.ajax({
            url: '/fatoObservado/retornarId',
            type: 'POST',
            data: $('#formFatoObservado').serialize(),
            success: function (data) {
                if (data === 'n') {
                    swal({
                        title: "Registro não encontrado!",
                        text: "Não foi encontrado nenhum registro que atenda ao critério especificado.",
                        icon: "warning",
                        button: "Ok!"
                    });

                } else {
                    selecionaCombo('idEstudante', data);
                }
            },
            error: function (data) {
                erro(data);
            }
        });
    } else {
        swal({
            title: "Digite um número!",
            text: "Você deve informar um número para poder continuar!",
            icon: "warning",
            button: "Ok!"
        });
    }
});
//preenche a caixa transgressao quando seleciona uma
$('#idTransgressao').change(function () {
    $('#idTrans').val($('#idTransgressao').val());
});



function selecionarPorNome() {
    var busca = $('#txtBusca').val();
    if (!busca) {
        swal({
            title: "Operação inválida!",
            text: "Você deve digitar um trecho do nome para busca!",
            icon: "warning",
            button: "Ok!"
        });
    } else {
        $.ajax({
            url: '/escola/selecionarPorNome',
            type: 'GET',
            data: $('#formBusca').serialize(),
            success: function (jsonData) {
                if (jsonData[0]) {
                    var html = "";
                    for (i = 0; i < jsonData.length; i++) {
                        var dados = jsonData[i];
                        html += "<div class=\"row\"><div class=\"col-md-4\"><label class=\"form-control\">" + dados.nome + "</label></div><div class=\"col-md-2\"> <input class=\"btn btn-primary\" type = \"button\" value=\"Selecionar\" onclick = \"selecionarPorId(" + dados.id + ")\"></div></div>";
                    }
                    $("#busca").html(html);
                } else {
                    swal({
                        title: "Registro não encontrado!",
                        text: "Não foi localizado nenhum registro que atenda ao critério especificado!",
                        icon: "warning",
                        button: "Ok!"
                    });
                }
            },
            error: function (data) {
                erro(data);
            }
        });
    }
}

function selecionarPorId(id) {
    $.ajax({
        url: '/escola/selecionarPorId/' + id,
        type: 'GET',
        success: function (data) {
            preencheFormulario('formEscola', data);
            $("#busca").html('');
            $("#txtBusca").val('');
            habilitaMenuFormulario();
            $("#idEscola").val(id);
        },
        error: function (data) {
            erro(data);
        }
    });
}

$('#btnExcluirEscola').click(function () {
    var id = $('#id').val();
    if (!id) {
        operacaoInvalida('Você deve selecionar uma escola para excluir!');
    } else {
        $.ajax({
            url: '/escola/excluir',
            type: 'DELETE',
            data: $('#formEscola').serialize(),
            success: function (data) {
                $('#id').val(data.id);
                if (data.id) {
                    limpaFormulario();
                    swal({
                        title: "Bom trabalho!",
                        text: "A escola " + data.nome + " foi excluída com sucesso!",
                        icon: "success",
                        button: "Ok!"
                    });
                }
            },
            error: function (data) {
                erro(data);
            }
        });
    }
});

//prepara para um novo registro
function novo() {
    var data = $('#data').val();
    limpaCampos();
    $("#idEstudante").focus();
    $('#data').val(data);

}

//esvazia os campos quando inicia nova busca
function limpaCampos() {
    limpaFormulario('formFatoObservado');
}


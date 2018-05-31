$('#btnSalvarTransgressao').click(function () {
    $.ajax({
        url: '/transgressao/salvar',
        type: 'POST',
        data: $('#formTransgressao').serialize(),
        success: function (data) {
            if (data.id) {
                $('#id').val(data.id);
                swal({
                    title: "Bom trabalho!",
                    text: "A transgressão " + data.nome + " foi salva com sucesso!",
                    icon: "success",
                    button: "Ok!"
                });
            }
        },
        error: function (data) {
            erro(data);
        }
    });
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
            url: '/transgressao/selecionarPorNome',
            type: 'GET',
            data: $('#formBusca').serialize(),
            success: function (jsonData) {
                if (jsonData[0]) {
                    var html = "";
                    for (i = 0; i < jsonData.length; i++) {
                        var dados = jsonData[i];
                        html += "<div class=\"row\"><div class=\"col-md-6\"><label class=\"form-control\">" + dados.nome + "</label></div><div class=\"col-md-2\"> <input class=\"btn btn-primary\" type = \"button\" value=\"Selecionar\" onclick = \"selecionarPorId(" + dados.id + ")\"></div></div>";
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
        url: '/transgressao/selecionarPorId/' + id,
        type: 'GET',
        success: function (data) {
            preencheFormulario('formTransgressao', data);
            $("#busca").html('');
            $("#txtBusca").val('');
            habilitaMenuFormulario();
            $("#idTransgressao").val(id);
        },
        error: function (data) {
            erro(data);
        }
    });
}

$('#btnExcluirTransgressao').click(function () {
    var id = $('#id').val();
    if (!id) {
        operacaoInvalida('Você deve selecionar uma transgressão para excluir!');
    } else {
        $.ajax({
            url: '/transgressao/excluir',
            type: 'DELETE',
            data: $('#formTransgressao').serialize(),
            success: function (data) {
                if (data.id) {
                    limpaFormulario('formTransgressao');
                    swal({
                        title: "Bom trabalho!",
                        text: "A transgressão " + data.nome + " foi excluída com sucesso!",
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
function novaTransgressao() {
    limpaCampos();
    $("#nome").focus();
}

//esvazia os campos quando inicia nova busca
function limpaCampos() {
    limpaFormulario('formBusca');
    limpaFormulario('formTransgressao');
    $('#busca').html('');
    desabilitaMenuFormulario();
}



$('#btnSalvarEscola').click(function () {
    $.ajax({
        url: '/escola/salvar',
        type: 'POST',
        data: $('#formEscola').serialize(),
        success: function (data) {
            if (data.id) {
                $('#id,#idEscola').val(data.id);
                $('#nomeAtual').html(data.nome);
                habilitaMenuFormulario();
                swal({
                    title: "Bom trabalho!",
                    text: "A escola " + data.nome + " foi salva com sucesso!",
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
            url: '/escola/selecionarPorNome',
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
        url: '/escola/selecionarPorId/' + id,
        type: 'GET',
        success: function (data) {
            preencheFormulario('formEscola', data);
            $("#busca").html('');
            $("#txtBusca").val('');
            habilitaMenuFormulario();
            $("#idEscola,#idEscolaObservacao").val(id);
            $('#nomeAtual').html(data.nome);
        },
        error: function (data) {
            erro(data);
        }
    });
}

$('#btnExcluirEscola').click(function () {
    var id = $('#id').val();
    if (!id) {
        operacaoInvalida('Você deve selecionar um escola para excluir!');
    } else {
        $.ajax({
            url: '/escola/excluir',
            type: 'DELETE',
            data: $('#formEscola').serialize(),
            success: function (data) {
                if (data.id) {
                    limpaCampos();
                    swal({
                        title: "Bom trabalho!",
                        text: "O escola " + data.nome + " foi excluído com sucesso!",
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

//esvazia os campos quando inicia nova busca
function limpaCampos() {
    limpaFormulario('formBusca');
    limpaFormulario('formEscola');
    $('#busca, #nomeAtual').html('');
    desabilitaMenuFormulario();
}
$('#btnSalvarEstudante').click(function () {
    $.ajax({
        url: '/estudante/salvar',
        type: 'POST',
        data: $('#formEstudante').serialize(),
        success: function (data) {
            if (data.id) {
                $('#id,#idEstudante').val(data.id);
                $('#nomeAtual').html(data.nome);
                habilitaMenuFormulario();
                swal({
                    title: "Bom trabalho!",
                    text: "O estudante " + data.nome + " foi salvo com sucesso!",
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
            url: '/estudante/selecionarPorNome',
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
        url: '/estudante/selecionarPorId/' + id,
        type: 'GET',
        success: function (data) {
            preencheFormulario('formEstudante', data);
            $("#busca").html('');
            $("#txtBusca").val('');
            habilitaMenuFormulario();
            $("#idEstudante,#idEstudanteObservacao").val(id);
            $('#nomeAtual').html(data.nome);
        },
        error: function (data) {
            erro(data);
        }
    });
}

$('#btnExcluirEstudante').click(function () {
    var id = $('#id').val();
    if (!id) {
        operacaoInvalida('Você deve selecionar um estudante para excluir!');
    } else {
        $.ajax({
            url: '/estudante/excluir',
            type: 'DELETE',
            data: $('#formEstudante').serialize(),
            success: function (data) {
                if (data.id) {
                    limpaCampos();
                    swal({
                        title: "Bom trabalho!",
                        text: "O estudante " + data.nome + " foi excluído com sucesso!",
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
function novoEstudante() {
    limpaCampos();
    $("#cpf").focus();
}

//esvazia os campos quando inicia nova busca
function limpaCampos() {
    limpaFormulario('formBusca');
    limpaFormulario('formEstudante');
    $('#busca, #nomeAtual').html('');
    desabilitaMenuFormulario();
}
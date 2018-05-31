$('#btnSalvarUsuario').click(function () {
    $.ajax({
        url: '/usuario/salvar',
        type: 'POST',
        data: $('#formUsuario').serialize(),
        success: function (data) {
            if (data.id) {
                $('#id').val(data.id);
                swal({
                    title: "Bom trabalho!",
                    text: "O usuário " + data.name + " foi salvo com sucesso!",
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
            url: '/usuario/selecionarPorNome',
            type: 'GET',
            data: $('#formBusca').serialize(),
            success: function (jsonData) {
                if (jsonData[0]) {
                    var html = "";
                    for (i = 0; i < jsonData.length; i++) {
                        var dados = jsonData[i];
                        html += "<div class=\"row\"><div class=\"col-md-4\"><label class=\"form-control\">" + dados.name + "</label></div><div class=\"col-md-2\"> <input class=\"btn btn-primary\" type = \"button\" value=\"Selecionar\" onclick = \"selecionarPorId(" + dados.id + ")\"></div></div>";
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
        url: '/usuario/selecionarPorId/' + id,
        type: 'GET',
        success: function (data) {
            preencheFormulario('formUsuario', data);
            $("#busca").html('');
            $("#txtBusca").val('');
            habilitaMenuFormulario();
            $("#idUsuario").val(id);
        },
        error: function (data) {
            erro(data);
        }
    });
}

$('#btnResetarSenha').click(function () {
    var id = $('#id').val();
    if (!id) {
        operacaoInvalida('Você deve selecionar um usuário para resetar a senha!');
    } else {
        $.ajax({
            url: '/usuario/resetarSenha',
            type: 'POST',
            data: $('#formUsuario').serialize(),
            success: function (data) {
                $('#id').val(data.id);
                if (data.id) {
                    swal({
                        title: "Bom trabalho!",
                        text: "A senha do usuário " + data.name + " foi resetada com sucesso!",
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

$('#btnExcluirUsuario').click(function () {
    var id = $('#id').val();
    if (!id) {
        operacaoInvalida('Você deve selecionar um usuário para excluir!');
    } else {
        $.ajax({
            url: '/usuario/excluir',
            type: 'DELETE',
            data: $('#formUsuario').serialize(),
            success: function (data) {
                if (data.id) {
                    limpaFormulario('formUsuario');
                    swal({
                        title: "Bom trabalho!",
                        text: "O usuário " + data.name + " foi excluído com sucesso!",
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
function novoUsuario() {
    limpaCampos();
    $("#name").focus();
}

//esvazia os campos quando inicia nova busca
function limpaCampos() {
    limpaFormulario('formBusca');
    limpaFormulario('formUsuario');
    $('#busca').html('');
    desabilitaMenuFormulario();
}



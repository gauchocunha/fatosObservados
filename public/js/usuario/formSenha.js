$('#btnSalvarSenha').click(function () {
    var password = $('#password').val();
    var confirmPassword = $('#confirmPassword').val();
    if (password!==confirmPassword) {
        operacaoInvalida('As senhas digitadas não são iguais!');
    } else {
        $.ajax({
            url: '/usuario/alterarSenha',
            type: 'POST',
            data: $('#formSenha').serialize(),
            success: function (data) {
                $('#id').val(data.id);
                if (data.id) {
                    swal({
                        title: "Bom trabalho!",
                        text: "A sua senha foi altualizada com sucesso!",
                        icon: "success",
                        button: "Ok!"
                    });
                    limpaFormulario('formSenha');
                }
            },
            error: function (data) {
                erro(data);
            }
        });
    }
});

$('#btnLimpar').click(function () {
    limpaFormulario('formSenha');
    $("#password").focus();
});



$('#btnGerarNumeracao').click(function () {
    swal({
        title: "Você tem certeza?",
        text: "Esse procedimento só pode ser executado uma vez por ano, pois refaz toda a numeração, sobrescrevendo qualquer informação existente!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: '/numeracao/gerarNumeracao',
                        type: 'POST',
                        data: $('#formNumeracao').serialize(),
                        success: function (data) {
                            if (data === 'ok') {
                                swal({
                                    title: "Bom trabalho!",
                                    text: "Numeração gerada com sucesso!",
                                    icon: "success",
                                    button: "Ok!"
                                });
                            }
                        },
                        error: function (data) {
                            erro(data);
                        }
                    });
                } else {
                    swal("A numeração não foi alterada!");
                }
            });
});

$('#btnAdicionarNumeracao').click(function () {

    $.ajax({
        url: '/numeracao/adicionarNumeracao',
        type: 'POST',
        data: $('#formNumeracao').serialize(),
        success: function (data) {
            if (data === 'ok') {
                swal({
                    title: "Bom trabalho!",
                    text: "Numero adicionado com sucesso!",
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

function selecionarPorId() {
    $.ajax({
        url: '/cro/selecionarPorId/1',
        type: 'GET',
        success: function (data) {
            preencheFormulario('formCRO', data);
            habilitaMenuFormulario();
        },
        error: function (data) {
            erro(data);
        }
    });
}

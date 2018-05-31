<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Seção de filtro
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <form>{{ csrf_field() }}</form>
    <div class="box">
        <div class="box-body">
            <form id='formFiltro' class="form-horizontal" action="" onsubmit="return false">
                <div class="form-group">
                    <div class="col-sm-9">
                        @include('comuns.comboEstudante')
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="numero" class="form-control campo" id="numero" placeholder="Entre com número do estudante.">
                    </div>
                </div>
            </form>
        </div>
        <div class="box-footer">
            <div class="pull-right hidden-xs">
                <input id="btnLimpar" class="btn btn-primary" value="Limpar" type="button">
                <input id="btnGerarRelatorio" class="btn btn-primary" value="Gerar relatório" type="button">
            </div>
        </div>
    </div>
    <script>
        $('#btnGerarRelatorio').click(function () {
            $('#formFiltro').attr('action', 'relatorio/relAlteracoes')
                    .attr('onsubmit', 'return true')
                    .submit();
        });

        $('#btnLimpar').click(function () {
            limpaFormulario('formFiltro');
            $("#relatorio").html('');
        });
        //seleciona a combo estudante quando preenche um número
        $('#numero').change(function () {
            if ($('#numero').val()) {
                $.ajax({
                    url: '/estudante/retornarId',
                    type: 'GET',
                    data: $('#formFiltro').serialize(),
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
    </script>
</section>



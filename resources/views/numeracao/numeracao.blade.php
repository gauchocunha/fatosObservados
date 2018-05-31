<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Numeração
        <small>Cadastro</small>
    </h1>
</section>

<section>

    <form id="formNumeracao" class="form-horizontal" role="form" method="post" action=""  onsubmit="return false">
        {{ csrf_field() }}
        <input type="hidden" name="id" id="id" value="" class="campo">
        <div class="box">

            <div class="box-body">
                <div class="form-group">
                    <label for="ano" class="col-sm-2 control-label">Ano <small class="vm"> *</small></label>
                    <div class="col-sm-10">
                        <input type="text" name="ano" class="form-control campo" id="ano" placeholder="Entre com o ano para gerar a numeração.">
                    </div>
                </div>

                @include('comuns.comboEstudante')
<!--
                <div class="form-group">
                    <label for="nome" class="col-sm-2 control-label">Nome <small class="vm"> *</small></label>
                    <div class="col-sm-10">
                        <input type="text" name="nome" class="form-control campo" id="nome" placeholder="Entre com o nome.">
                    </div>
                </div>

                <div class="form-group">
                    <label for="presidente" class="col-sm-2 control-label">Presidente <small class="vm"> *</small></label>
                    <div class="col-sm-10">
                        <input type="text" name="presidente" class="form-control campo" id="presidente" placeholder="Entre com o nome do presidente.">
                    </div>
                </div>
-->



            </div>
            <!-- /.box-body -->
            <div class="box-footer">

                <div class="btn-group">
                    <input id="btnGerarNumeracao" class="btn btn-primary"  value="Gerar numeração" type="button">
                </div>
                <div class="btn-group">
                    <input id="btnAdicionarNumeracao" class="btn btn-primary"  value="Adicionar numeração para um estudante" type="button">
                </div>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </form>

    <script src="{{asset('js/numeracao/formNumeracao.js')}}"></script>


</section>

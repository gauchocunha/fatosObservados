<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Fatos observados
        <small>Cadastro</small>
    </h1>
</section>
<section>
    <form id="formFatoObservado" class="form-horizontal" role="form" method="post" action=""  onsubmit="return false">
        {{ csrf_field() }}
        <input type="hidden" name="id" id="id" value="" class="campo">
        <div class="box">
            <div class="box-body">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="data" class="col-sm-2 control-label">Data <small class="vm"> *</small></label>
                        <div class="col-sm-10">
                            <input type="text" name="data" class="form-control campo date tabula" id="data" placeholder="Entre com a data.">
                        </div>
                    </div>
                </div>
                <div class="col-sm-3"></div>
                <div class="col-sm-9">
                    @include('comuns.comboEstudante')
                </div>
                <div class="col-sm-3">
                    <input type="text" name="numero" class="form-control campo tabula" id="numero" placeholder="Entre com número do estudante.">
                </div>
                <div class="col-sm-9">
                    @include('comuns.comboTransgressao')
                </div>
                <div class="col-sm-3">
                    <input type="text" name="idTrans" class="form-control campo tabula" id="idTrans" onchange="selecionaCombo('idTransgressao', this.value)" placeholder="Entre com código da alteração.">
                </div>
                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="observacao" class="col-sm-2 control-label">Obs </label>
                        <div class="col-sm-10">
                            <input type="text" name="observacao" class="form-control campo tabula" id="observacao" placeholder="Entre com alguma observação que julgar necessária.">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <input id="btnNovoFato" class="btn btn-primary" onclick="novo();"  value="Novo" type="button">
                </div>
                <div class="btn-group">
                    <input id="btnSalvarFato" class="btn btn-primary" onclick="salvar();" value="Salvar" type="button">
                </div>
                <div class="btn-group">
                    <input id="btnSalvarENovo" class="btn btn-primary" onclick="salvar(1);" value="Salvar & Novo" type="button">
                </div>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </form>
    <script src="{{asset('js/fatoObservado/formFatoObservado.js')}}"></script>
</section>
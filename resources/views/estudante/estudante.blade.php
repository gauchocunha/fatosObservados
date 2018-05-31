<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Estudantes
        <small>Cadastro</small>
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-sm-4">
            <form id="formBusca" onsubmit="return false">
                {{ csrf_field() }}
                <input  id="txtBusca" name="txtBusca" class="form-control" value="" onchange="selecionarPorNome();" onfocus="limpaCampos();" placeholder="Digite um trecho do nome..." type="text">
            </form>
        </div>
    </div>
    <h3>
        <div id="nomeAtual" class="campo"></div>
    </h3>
    <div id="abaEstudante">
        <div id="busca" style="margin-top: 8px;">
        </div>
        <form id="formEstudante" class="form-horizontal" role="form" method="post" action="" onsubmit="return false">
            {{ csrf_field() }}
            <input type="hidden" name="id" id="id" value="" class="campo">
            <div class="box">
                <div class="box-body">
                    <div class="form-group">
                        <label for="cpf" class="col-sm-2 control-label">CPF <small class="vm"> *</small></label>
                        <div class="col-sm-10">
                            <input type="text" name="cpf" class="form-control campo tabula" id="cpf" placeholder="Entre com o CPF.">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nome" class="col-sm-2 control-label">Nome <small class="vm"> *</small></label>
                        <div class="col-sm-10">
                            <input type="text" name="nome" class="form-control campo tabula" id="nome" placeholder="Entre com o nome.">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nomeDeGuerra" class="col-sm-2 control-label">Nome de guerra <small class="vm"> *</small></label>
                        <div class="col-sm-10">
                            <input type="text" name="nomeDeGuerra" class="form-control campo tabula" id="nomeDeGuerra" placeholder="Entre com o nome de guerra.">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ativo" class="col-sm-2 control-label">Ativo <small class="vm"> *</small></label>
                        <div class="col-sm-10">
                            <select id="ativo" name="ativo" class="form-control campo tabula">
                                <option value="">Selecione...</option>
                                <option value="s">Sim</option>
                                <option value="n">Não</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="pull-right hidden-xs">
                        <input id="btnExcluirEstudante" class="btn btn-warning" value="Excluir" type="button">
                    </div>
                    <div class="btn-group">
                        <input id="btnNovoEstudante" class="btn btn-primary"  value="Novo" type="button" onclick="novoEstudante();">
                        <input id="btnSalvarEstudante" class="btn btn-primary"  value="Salvar" type="button">
                    </div>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </form>
    </div>
    <script src="{{asset('js/estudante/formEstudante.js')}}"></script>
</section>
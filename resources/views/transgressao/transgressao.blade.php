<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Alterações
        <small>Cadastro</small>
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-sm-3">
            <form id="formBusca" onsubmit="return false">
                {{ csrf_field() }}
                <input  id="txtBusca" name="txtBusca" class="form-control" value="" onchange="selecionarPorNome();" onfocus="limpaCampos();" placeholder="Digite um trecho da descrição..." type="text">
            </form>
        </div>
    </div>
</div>
<div id="busca" style="margin-top: 8px;">
</div>
<form id="formTransgressao" class="form-horizontal" role="form" method="post" action=""  onsubmit="return false">
    {{ csrf_field() }}
    <input type="hidden" name="id" id="id" value="" class="campo">
    <div class="box">
        <div class="box-body">
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Descrição <small class="vm"> *</small></label>
                <div class="col-sm-10">
                    <input type="text" name="nome" class="form-control campo tabula" id="nome" placeholder="Entre com a descrição da alteração.">
                </div>
            </div>
            <div class="form-group">
                <label for="pontuacao" class="col-sm-2 control-label">Pontuação <small class="vm"> *</small></label>
                <div class="col-sm-10">
                    <input type="text" name="pontuacao" class="form-control campo tabula" id="pontuacao" placeholder="Entre com a pontuação.">
                </div>
            </div>
            <div class="form-group">
                <label for="tipo" class="col-sm-2 control-label">Tipo <small class="vm"> *</small></label>
                <div class="col-sm-10">
                    <select id="ativo" name="tipo" class="form-control campo tabula">
                        <option value="">Selecione...</option>
                        <option value="1">Referência elogiosa</option>
                        <option value="2">Transgressão</option>
                    </select>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="pull-right hidden-xs">
                <input id="btnExcluirTransgressao" class="btn btn-warning" value="Excluir" type="button">
            </div>
            <div class="btn-group">
                <input id="btnNovaTransgressao" class="btn btn-primary"  value="Nova" type="button" onclick="novaTransgressao();">
                <input id="btnSalvarTransgressao" class="btn btn-primary"  value="Salvar" type="button">
            </div>
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->
</form>
<script src="{{asset('js/transgressao/formTransgressao.js')}}"></script>
</section>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Escolas
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
        <form id="formEscola" class="form-horizontal" role="form" method="post" action="" onsubmit="return false">
            {{ csrf_field() }}
            <input type="hidden" name="id" id="id" value="" class="campo">
            <div class="box">
                <div class="box-body">
                    {!!$html!!}
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="pull-right hidden-xs">
                        <input id="btnExcluirEstudante" class="btn btn-warning" value="Excluir" type="button">
                    </div>
                    <div class="btn-group">
                        <input id="btnSalvarEscola" class="btn btn-primary"  value="Salvar" type="button">
                    </div>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </form>
    </div>
    <script src="{{asset('js/escola/formEscola.js')}}"></script>
</section>
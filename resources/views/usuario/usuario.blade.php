<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Usuários
        <small>Cadastro</small>
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-sm-3">
            <form id="formBusca" onsubmit="return false">
                {{ csrf_field() }}
                <input  id="txtBusca" name="txtBusca" class="form-control" value="" onchange="selecionarPorNome();" onfocus="limpaCampos();" placeholder="Digite um trecho do nome..." type="text">
            </form>
        </div>
    </div>
    <div id="busca" style="margin-top: 8px;">
    </div>
    <form id="formUsuario" class="form-horizontal" role="form" method="post" action=""  onsubmit="return false">
        {{ csrf_field() }}
        <input type="hidden" name="id" id="id" value="" class="campo">
        <div class="box">
            <div class="box-body">
                <div class="form-group">
                    <label for="nome" class="col-sm-2 control-label">Nome <small class="vm"> *</small></label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control campo tabula" id="name" placeholder="Entre com o nome do usuário.">
                    </div>
                </div>
                <div class="form-group">
                    <label for="perfil" class="col-sm-2 control-label">Perfil <small class="vm"> *</small></label>
                    <div class="col-sm-10">
                        <select id="perfil" name="perfil" class="form-control campo tabula">
                            <option value="">Selecione...</option>
                            <option value="3">Administrador</option>
                            <option value="2">Operador</option>
                            <option value="1">Visualizador</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ativo" class="col-sm-2 control-label">Ativo? <small class="vm"> *</small></label>
                    <div class="col-sm-10">
                        <select id="ativo" name="ativo" class="form-control campo tabula">
                            <option value="">Selecione...</option>
                            <option value="s">Sim</option>
                            <option value="n">Não</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">e-mail <small class="vm"> *</small></label>
                    <div class="col-sm-10">
                        <input type="text" name="email" class="form-control campo tabula" id="email" placeholder="Entre com o e-mail.">
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="pull-right hidden-xs">
                    <input id="btnExcluirUsuario" class="btn btn-warning" value="Excluir" type="button">
                    <input id="btnResetarSenha" class="btn btn-warning" value="Resetar senha" type="button">
                </div>
                <div class="btn-group">
                    <input id="btnNovoUsuario" class="btn btn-primary"  value="Novo" type="button" onclick="novoUsuario();">
                    <input id="btnSalvarUsuario" class="btn btn-primary"  value="Salvar" type="button">
                </div>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </form>
    <script src="{{asset('js/usuario/formUsuario.js')}}"></script>
</section>

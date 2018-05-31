<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Usuários
        <small>Atualização da senha</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <form id="formSenha" class="form-horizontal" role="form" method="post" action=""  onsubmit="return false">
        {{ csrf_field() }}
        <div class="box">

            <div class="box-body">

                <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">Senha <small class="vm"> *</small></label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control campo" id="password" placeholder="Entre com a nova senha.">
                    </div>
                </div>

                <div class="form-group">
                    <label for="confirmPassword" class="col-sm-2 control-label">Confirme a senha <small class="vm"> *</small></label>
                    <div class="col-sm-10">
                        <input type="password" name="confirmPassword" maxlength="15" class="form-control campo" id="confirmPassword" placeholder="Confirme a nova senha.">
                    </div>
                </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <input id="btnSalvarSenha" class="btn btn-primary"  value="Salvar" type="button">
                    <input id="btnLimpar" class="btn btn-primary"  value="Limpar" type="button">
                </div>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </form>

    <script src="{{asset('js/usuario/formSenha.js')}}"></script>
</section>

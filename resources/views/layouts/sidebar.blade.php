    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU PRINCIPAL</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-archive"></i> <span>Cadastros</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#" onclick="carregaPagina('/usuario/cadastro');"><i class="fa fa-circle-o"></i> Usuários</a></li>
            <li><a href="#" onclick="carregaPagina('/escola/cadastro');"><i class="fa fa-circle-o"></i> Escolas</a></li>
            <li><a href="#" onclick="carregaPagina('/transgressao/cadastro');"><i class="fa fa-circle-o"></i> Alterações</a></li>
            <li><a href="#" onclick="carregaPagina('/estudante/cadastro');"><i class="fa fa-circle-o left"></i> Estudantes</a></li>
            <li><a href="#" onclick="carregaPagina('/numeracao/cadastro');"><i class="fa fa-circle-o"></i> Numeração</a></li>
            <li><a href="#" onclick="carregaPagina('/fatoObservado/cadastro');"><i class="fa fa-circle-o"></i> Fatos observados</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-paste"></i>
            <span>Relatórios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#" onclick="carregaPagina('/relatorio/filtro');"><i class="fa fa-circle-o"></i> Alterações</a></li>
            <li><a href="/relatorio/relNumeracao"><i class="fa fa-circle-o"></i> Numeração</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-question-circle"></i>
            <span>Ajuda</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#" onclick="carregaPagina('/ajuda/ajuda');"><i class="fa fa-circle-o"></i> Visão geral</a></li>
          </ul>
        </li>
    </ul>
    <!-- /.sidebar -->

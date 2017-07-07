@if (Auth::check())
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="http://placehold.it/160x160/00a65a/ffffff/&text={{ Auth::user()->name[0] }}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{ Auth::user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">{{ trans('backpack::base.administration') }}</li>
          <!-- ================================================ -->
          <!-- ==== Recommended place for admin menu items ==== -->
          <!-- ================================================ -->
          <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/page') }}"><i class="fa fa-file-o"></i> <span>Paginas</span></a></li>

          <li class="treeview">
              <a href="#"><i class="fa fa-newspaper-o"></i> <span>Postagens</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="{{ url('admin/article') }}"><i class="fa fa-circle-o"></i> <span>Articles</span></a></li>
                <li><a href="{{ url('admin/category') }}"><i class="fa fa-circle-o"></i> <span>Categories</span></a></li>
                <li><a href="{{ url('admin/tag') }}"><i class="fa fa-circle-o"></i> <span>Tags</span></a></li>
              </ul>
          </li>

          <li class="treeview">
              <a href="#"><i class="fa fa-newspaper-o"></i> <span>Comunicados</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="{{ url('admin/comunicado') }}"><i class="fa fa-circle-o"></i> <span>Comunicados</span></a></li>
              </ul>
          </li>

          <li class="treeview">
            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> <span>Usuários</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                  <li><a href="{{ url('admin/users') }}"><i class="fa fa-circle-o"></i> <span>Cadastrados</span></a></li>
                  <li><a href="{{ url('admin/roles') }}"><i class="fa fa-circle-o"></i> <span>Funções</span></a></li>
                  <li><a href="{{ url('admin/usuarios/index') }}"><i class="fa fa-circle-o"></i> <span>Documentação</span></a></li>
              </ul>
          </li>
          <li><a href="{{ url('admin/chamados') }}"><i class="fa fa-ticket" aria-hidden="true"></i> <span>Chamados</span></a></li>
          <!-- ======================================= -->
          <li class="header">{{ trans('backpack::base.user') }}</li>
          <li><a href="{{ url('admin/logout') }}"><i class="fa fa-sign-out"></i> <span>{{ trans('backpack::base.logout') }}</span></a></li>

        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
@endif

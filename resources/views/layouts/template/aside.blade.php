 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> -->
      <span class="brand-text font-weight-light">Lara Stock</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
         <!--  <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          @can('dashboard')
            <li class="nav-item has-treeview">
              <a href="{{route('dashboard.index')}}" class="nav-link">
                <i class="nav-icon fa fa-pie-chart"></i>
                <p>
                 Dashboard</p>
                <i class="right fa fa-angle-left"></i>
              </a>
            </li>
          @endcan
          @can('View Fornecedor')
          <li class="nav-item has-treeview">
            <a href="{{route('fornecedor.index')}}" class="nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Fornecedor</p>
                <i class="right fa fa-angle-left"></i>
            </a>
          </li>
          @endcan
            @can('view_produto')
          <li class="nav-item has-treeview">
                <a href="{{route('produto.index')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Produto</p>
                  <i class="right fa fa-angle-left"></i>
                </a>
          </li>
            @endcan
            @can('View Setor')
          <li class="nav-item has-treeview">
            <a href="{{route('setor.index')}}" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Setor</p>
              <i class="right fa fa-angle-left"></i>
            </a>
          </li>
            @endcan
            @can('View Entrada')
          <li class="nav-item has-treeview">
            <a href="{{route('entrada.index')}}" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Entrada</p>
              <i class="right fa fa-angle-left"></i>
            </a>
          </li>
            @endcan
            @can('View Saida')
          <li class="nav-item has-treeview">
            <a href="{{route('saida.index')}}" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Saída</p>
              <i class="right fa fa-angle-left"></i>
            </a>
          </li>
         @endcan
          {{--@can('View Perfil')--}}
          <li class="nav-item has-treeview">
            <a href="{{route('roles.index')}}" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Perfil</p>
              <i class="right fa fa-angle-left"></i>
            </a>
          </li>
          {{--@endcan--}}
            @can('view_permission')
          <li class="nav-item has-treeview">
            <a href="{{route('permissions.index')}}" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Permissão</p>
              <i class="right fa fa-angle-left"></i>
            </a>
          </li>
            @endcan
            @can('posts_index')
            <li class="nav-item has-treeview">
              <a href="{{route('posts.index')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Posts</p>
                <i class="right fa fa-angle-left"></i>
              </a>
            </li>
            @endcan
            @can('view_users')
              <li class="nav-item has-treeview">
                <a href="{{route('users.index')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Usuários</p>
                  <i class="right fa fa-angle-left"></i>
                </a>
              </li>
            @endcan
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

 <div class="collapse navbar-collapse" id="navbarSupportedContent">
   <!-- Left Side Of Navbar -->
   <ul class="navbar-nav mr-auto">
     @if (!Auth::guest())
       <li><a href="{{ route('posts.create') }}">New Article</a></li>
     @endif
   </ul>

   <!-- Right Side Of Navbar -->
   <ul class="navbar-nav ml-auto">
     <!-- Authentication Links -->
     @guest
       <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
       <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
     @else
       <li class="nav-item dropdown">
         <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
           {{ Auth::user()->name }} <span class="caret"></span>
         </a>

         @role('Admin') {{-- Laravel-permissions blade helper --}}
         <a href="#"><i class="fa fa-btn fa-unlock"></i>Admin</a>
         @endrole

         <div class="dropdown-menu" aria-labelledby="navbarDropdown">
           <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
             {{ __('Logout') }}
           </a>

           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
             @csrf
           </form>
         </div>
       </li>
     @endguest
   </ul>
 </div>
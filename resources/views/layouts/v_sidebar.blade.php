 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="{{asset('/images/logo_groot.png')}}"
           alt="Grootech Logo"
           class="brand-image"
           style="opacity: .8">
      <span class="brand-text font-weight-light"> <b>Grootech</b> </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('/template/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> --}}

       <!-- Sidebar Menu -->
       <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-dolly"></i>
              <p>
                Assets
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('all_assets') }}" class="nav-link">
                  <i class="fas fa-globe nav-icon"></i>
                  <p>All Assets</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('unit') }}" class="nav-link">
                  <i class="fab fa-trello nav-icon"></i>
                  <p>Unit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('location') }}" class="nav-link">
                 <i class="fas fa-thumbtack nav-icon"></i>
                  <p>Location</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('category') }}" class="nav-link">
                  <i class="fas fa-swatchbook nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
            </ul>
          </li>
         
          <!-- Sidebar Menu -->
       <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('location') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>BOM</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('category') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Material</p>
                </a>
              </li>
            </ul>
          </li>
          

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
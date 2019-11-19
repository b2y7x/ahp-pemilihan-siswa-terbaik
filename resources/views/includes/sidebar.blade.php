<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="/logo_small.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SMA N 5 PURWOREJO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/home" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                HOME
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin" class="nav-link {{ Request::is('admin') ? 'active' : '' }}">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                ADMIN / GURU
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview {{ Request::is('kriteria', 'alternatif') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Request::is('kriteria', 'alternatif') ? 'active' : '' }}">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                MASTER DATA
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview pl-4">
              <li class="nav-item">
                <a href="/kriteria" class="nav-link {{ Request::is('kriteria') ? 'active' : '' }}">
                  <p>KRITERIA</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/alternatif" class="nav-link {{ Request::is('alternatif') ? 'active' : '' }}">
                  <p>ALTERNATIF</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{ Request::is('bobot_kriteria', 'bobot_sub_kriteria*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Request::is('bobot_kriteria', 'bobot_sub_kriteria*') ? 'active' : '' }}">
              <i class="nav-icon fa fa-tree"></i>
              <p>
                ANALISA
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview pl-4">
              <li class="nav-item">
                <a href="/bobot_kriteria" class="nav-link {{ Request::is('bobot_kriteria') ? 'active' : '' }}">
                  <p>BOBOT KRITERIA</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/bobot_sub_kriteria" class="nav-link {{ Request::is('bobot_sub_kriteria*') ? 'active' : '' }}">
                  <p>BOBOT SUB KRITERIA</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/hasil" class="nav-link {{ Request::is('hasil*') ? 'active' : '' }}">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                LAPORAN/PERHITUNGAN
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                LOGOUT
              </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
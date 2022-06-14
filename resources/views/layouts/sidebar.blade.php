<!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-heading">Master</li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Master</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse @if(Request::is('master/*')) show @endif" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('master/eselon') }}" class="@if(Request::is('master/eselon')) active @endif">
              <i class="bi bi-circle"></i><span>Master Eselon</span>
            </a>
          </li>
          <li>
            <a href="components-accordion.html">
              <i class="bi bi-circle"></i><span>Master Jabatan</span>
            </a>
          </li>

        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-heading">Data Pegawai</li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Master</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse @if(Request::is('master/*')) show @endif" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('master/eselon') }}" class="@if(Request::is('master/eselon')) active @endif">
              <i class="bi bi-circle"></i><span>Data Pegawai</span>
            </a>
          </li>
          

        </ul>
      </li><!-- End Components Nav -->
     

    </ul>

  </aside><!-- End Sidebar-->

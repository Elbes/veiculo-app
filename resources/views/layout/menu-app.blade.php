<nav class="pcoded-navbar">
  <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
  <div class="pcoded-inner-navbar main-menu">

    <div class="pcoded-navigation-label" data-i18n="nav.category.navigation"></div>
    <ul class="pcoded-item pcoded-left-item">
      <li class="active">
        <a href="{{url('/home')}}" class="waves-effect waves-dark">
          <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
          <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
          <span class="pcoded-mcaret"></span>
        </a>
      </li>
      
    </ul>
    <ul class="pcoded-item pcoded-left-item">
      <li>
        <a href="{{url('/lista-veiculos')}}" class="waves-effect waves-dark">
          <span class="pcoded-micon"><i class="ti-car"></i><b>FC</b></span>
          <span class="pcoded-mtext" data-i18n="nav.form-components.main">Veículos</span>
          <span class="pcoded-mcaret"></span>
        </a>
      </li>
      
    </ul>

    <ul class="pcoded-item pcoded-left-item">
      <li>
        <a href="{{url('/lista-manutencoes')}}" class="waves-effect waves-dark">
          <span class="pcoded-micon"><i class="ti-alert"></i><b>M</b></span>
          <span class="pcoded-mtext" data-i18n="nav.form-components.main">Manutenções</span>
          <span class="pcoded-mcaret"></span>
        </a>
      </li>
      
    </ul>

    <ul class="pcoded-item pcoded-left-item">
      <li>
        <a href="chart.html" class="waves-effect waves-dark">
          <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
          <span class="pcoded-mtext" data-i18n="nav.form-components.main">Marcas</span>
          <span class="pcoded-mcaret"></span>
        </a>
      </li>
      
    </ul>

    <ul class="pcoded-item pcoded-left-item">
      <li>
        <a href="chart.html" class="waves-effect waves-dark">
          <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
          <span class="pcoded-mtext" data-i18n="nav.form-components.main">Cores</span>
          <span class="pcoded-mcaret"></span>
        </a>
      </li>
    </ul>

    <ul class="pcoded-item pcoded-left-item">
      <li>
        <a href="{{ url('/logout') }}" class="waves-effect waves-dark">
          <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
          <span class="pcoded-mtext" data-i18n="nav.form-components.main">Sair</span>
          <span class="pcoded-mcaret"></span>
        </a>
      </li>
    </ul>

    
  
  </div>
</nav>
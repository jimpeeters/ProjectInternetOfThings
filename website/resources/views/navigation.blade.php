<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu">
    <li class="header">Restaurant wora</li>
    <li class="{{ Request::is('dashboard*') ? 'active' : null }}">
      <a href="{{ route('dashboard') }}">
        <i class="fa fa-tachometer"></i> <span>Dashboard</span>
      </a>
    </li>
    <li class="{{ Request::is('gebieden*') ? 'active' : null }}">
      <a href="/gebieden">
        <i class="fa fa-cutlery"></i> <span>Gebieden</span>
      </a>
    </li>
    <li class="treeview {{ Request::is('ober*') ? 'active' : null }}">
      <a href="#">
        <i class="fa fa-glass"></i> <span>Obers</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li class="{{ Request::is('ober') ? 'active' : null }}"><a href="{{ route('ober.index') }}"><i class="fa fa-user"></i>overzicht</a></li>
        <li class="{{ Request::is('ober/toekennen*') ? 'active' : null }}"><a href="{{ route('waiterarea.create') }}"><i class="fa fa-plus-square"></i>toekennen</a></li>
        <li class="{{ Request::is('*planning*') ? 'active' : null }}"><a href="{{ route('planning.index') }}"><i class="fa fa-calendar"></i>planning</a></li>
      </ul>
    </li>
    {{-- <li class="{{ Request::is('ober*') ? 'active' : null }}">
      <a href="{{ route('ober.index') }}">
        <i class="fa fa-glass"></i> <span>Obers</span>
      </a>
    </li>
    <li class="{{ Request::is('planning*') ? 'active' : null }}">
      <a href="{{ route('planning.index') }}">  
        <i class="fa fa-calendar"></i>  <span>planning</span>
      </a> --}}
    </li>
    <li class="{{ Request::is('klanten*') ? 'active' : null }}">
      <a href="{{ route('klanten.index') }}">
        <i class="fa fa-male"></i> <span>Klanten</span>
      </a>
    </li>
    <li class="{{ Request::is('statistieken') ? 'active' : null }}">
      <a href="{{ route('statistics') }}">
        <i class="fa fa-bar-chart"></i> <span>Statistieken</span>
      </a>
    </li>
    
  </ul>

</section>
<!-- /.sidebar -->
</aside>

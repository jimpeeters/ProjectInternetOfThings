<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu">
    <li class="header">Restaurant Colmar</li>
    <li>
      <a href="{{ route('dashboard') }}">
        <i class="fa fa-tachometer"></i> <span>Dashboard</span>
      </a>
    </li>
    <li>
      <a href="/gebieden">
        <i class="fa fa-cutlery"></i> <span>Gebieden</span>
      </a>
    </li>
    <li>
      <a href="/tafels">
        <i class="fa fa-object-group"></i> <span>Tafels</span>
      </a>
    </li>
    <li>
      <a href="{{ route('ober.index') }}">
        <i class="fa fa-glass"></i> <span>Obers</span>
      </a>
    </li>
    <li>
      <a href="{{ route('klanten.index') }}">
        <i class="fa fa-male"></i> <span>Klanten</span>
      </a>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-bar-chart"></i> <span>Statistieken</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ route('statistics') }}"><i class="fa fa-circle-o"></i>Overzicht</a></li>
        <li><a href="#"><i class="fa fa-circle-o"></i>Data</a></li>
      </ul>
    </li>
  </ul>

</section>
<!-- /.sidebar -->
</aside>

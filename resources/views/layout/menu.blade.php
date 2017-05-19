<ul class="sidebar-menu">
    <li class="header">Menú de navegación</li>
    <li class="{{ Request::route()->getName() == 'dashboard' ? 'active' : '' }}">
        <a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
    </li>

    <li class="{{ in_array(Request::segment(1), ['']) ? 'active' : '' }}">
        <a href="#">
            <i class="fa fa-bar-chart-o"></i><span>Simulador</span>
        </a>
    </li>
</ul>
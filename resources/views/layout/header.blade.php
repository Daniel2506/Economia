<header class="main-header">
    <a href="{{ route('dashboard') }}" class="logo">
        <span class="logo-mini">ECO</b></span>
        <span class="logo-lg"><b>Economia</b></span>
    </a>

    {{-- Header Navbar: style can be found in header.less --}}
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
        </a>

        {{-- Navbar Right Menu --}}
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <ul class="dropdown-menu">
                        {{-- The user image in the menu --}}
                        <li class="user-header">
                            <img src="{{ asset(config('daniel.app.image.avatar')) }}" class="img-circle" alt="User Image"/>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

<aside class="main-sidebar">
    <section class="sidebar">
        {{-- Sidebar user panel --}}
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset(config('daniel.app.image.avatar')) }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        @include('layout.menu')
    </section>
</aside>
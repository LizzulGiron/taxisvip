<!doctype html>
<html lang="en">
 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon"  type="image/png" href="{{ asset('assets/images/icono.ico') }}">
</head>

<body>
    <div class="dashboard-main-wrapper">
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item" style="margin-bottom: 5px">
                                <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1">
                                    <i class="fas fa-car"></i>Carreras
                                </a>
                                <div id="submenu-1" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item" style="margin-bottom: 5px">
                                            <a class="nav-link" href="{{ url('carreras/create')}}">
                                                <i class="fab fa-fw fa-wpforms"></i>Registrar Carrera
                                            </a>
                                        </li>
                                        <li class="nav-item" style="margin-bottom: 5px">
                                            <a class="nav-link" href="{{ url('carreras/') }}"><i class="far fa-window-close"></i>Finalizar carrera</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item" style="margin-bottom: 5px">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2">
                                    <i class="fa fa-fw fa-user-circle"></i>Conductores
                                </a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item" style="margin-bottom: 5px">
                                            <a class="nav-link" href="{{ url('usuarios/create') }}"><i class="fas fa-users"></i>Registrar conductor</a>
                                        </li>
                                        <li class="nav-item" style="margin-bottom: 5px">
                                            <a class="nav-link" href="{{ url('conductores') }}"><i class="fas fa-car"></i>Conductores</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item" style="margin-bottom: 5px">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3">
                                    <i class="fas fa-map-marker-alt"></i>Colonias
                                </a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item" style="margin-bottom: 5px">
                                            <a class="nav-link" href="{{ url('colonias/create')}}">
                                                <i class="fab fa-fw fa-wpforms"></i>Registrar Colonia
                                            </a>
                                        </li>
                                        <li class="nav-item" style="margin-bottom: 5px">
                                            <a class="nav-link" href="{{ url('colonias') }}"><i class="fas fa-map-signs"></i>Colonias</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item" style="margin-bottom: 5px">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4">
                                    <i class="fas fa-users"></i>Clientes
                                </a>
                                <div id="submenu-4" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item" style="margin-bottom: 5px">
                                            <a class="nav-link" href="{{ url('clientes/create') }}">
                                                <i class="fab fa-fw fa-wpforms"></i>Registrar Cliente
                                            </a>
                                        </li>
                                        <li class="nav-item" style="margin-bottom: 5px">
                                            <a class="nav-link" href="{{ url('usuarios') }}"><i class="fas fa-address-book"></i>Clientes</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item" style="margin-bottom: 5px">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6">
                                    <i class="fas fa-car"></i>Vehículos
                                </a>
                                <div id="submenu-6" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item" style="margin-bottom: 5px">
                                            <a class="nav-link" href="{{ url('marcas/create') }}"><i class="fab fa-fw fa-wpforms"></i>Registrar Marca</a>
                                        </li>
                                        <li class="nav-item" style="margin-bottom: 5px">
                                            <a class="nav-link" href="{{ url('marcas') }}"><i class="fas fa-car"></i>Marcas</a>
                                        </li>
                                        <li class="nav-item" style="margin-bottom: 5px">
                                            <a class="nav-link" href="{{ url('modelos/create') }}"><i class="fab fa-fw fa-wpforms"></i>Registrar Modelo</a>
                                        </li>
                                        <li class="nav-item" style="margin-bottom: 5px">
                                            <a class="nav-link" href="{{ url('modelos') }}"><i class="fas fa-car"></i>Modelos</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('pagos/') }}">
                                    <i class="far fa-money-bill-alt"></i>Pagos
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</body>
 
</html>
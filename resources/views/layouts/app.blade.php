<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.nam', 'Laravel'))</title>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    
    <!-- Incluir tus estilos personalizados -->
    @stack('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div id="app" class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Navbar Content -->
        </nav>

        <!-- Barra lateral -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Contenido del menú lateral -->
            <div class="sidebar">
                <!-- Sidebar Content -->
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                    <!-- Menú -->
                    <li class="nav-item">
                        <a href="{{ URL::to('tasks') }}" class="nav-link">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>{{ __('Tareas') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ URL::to('developers') }}" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>{{ __('Ver desarrolladores') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ URL::to('statuses') }}" class="nav-link">
                            <i class="nav-icon fas fa-check-circle"></i>
                            <p>{{ __('Ver estados') }}</p>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <!-- Contenido principal -->
        <div class="">
            <section class="content">
                <!-- Contenido de la vista -->
                @yield('content')
            </section>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/js/adminlte.min.js"></script>
    <!-- Incluir tus scripts personalizados -->
    @stack('js')
</body>
</html>

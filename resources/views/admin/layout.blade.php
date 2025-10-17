<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel')</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            background: #f7fafc;
            color: #525f7f;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100vh;
            background: linear-gradient(87deg, #5e72e4 0, #825ee4 100%);
            padding: 20px 0;
            z-index: 1000;
            transition: all 0.3s;
        }

        .sidebar-brand {
            padding: 20px;
            color: white;
            font-size: 1.5rem;
            font-weight: 600;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            margin-bottom: 20px;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin: 5px 15px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            border-radius: 0.375rem;
            transition: all 0.15s ease;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .sidebar-menu i {
            margin-right: 12px;
            font-size: 1rem;
        }

        .main-content {
            margin-left: 250px;
            min-height: 100vh;
            transition: all 0.3s;
        }

        .navbar {
            background: white;
            padding: 1rem 2rem;
            box-shadow: 0 1px 3px rgba(50, 50, 93, 0.15);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            font-size: 1.25rem;
            font-weight: 600;
            color: #32325d;
        }

        .navbar-user {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .navbar-user span {
            color: #525f7f;
        }

        .btn-logout {
            padding: 8px 16px;
            background: #f5365c;
            color: white;
            border: none;
            border-radius: 0.375rem;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .btn-logout:hover {
            background: #ec0c38;
        }

        .content {
            padding: 2rem;
        }

        .header {
            background: linear-gradient(87deg, #5e72e4 0, #825ee4 100%);
            padding: 6rem 2rem 3rem;
            margin: -2rem -2rem 2rem;
            border-radius: 0 0 1rem 1rem;
        }

        .header-title {
            color: white;
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .header-breadcrumb {
            color: rgba(255, 255, 255, 0.8);
        }

        .card {
            background: white;
            border-radius: 0.375rem;
            box-shadow: 0 0 2rem 0 rgba(136, 152, 170, 0.15);
            margin-bottom: 2rem;
        }

        .card-header {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid #e9ecef;
            background: white;
            border-radius: 0.375rem 0.375rem 0 0;
        }

        .card-title {
            font-size: 1.0625rem;
            font-weight: 600;
            margin: 0;
            color: #32325d;
        }

        .card-body {
            padding: 1.5rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            border-radius: 0.375rem;
            box-shadow: 0 0 2rem 0 rgba(136, 152, 170, 0.15);
            padding: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .stat-content h3 {
            font-size: 0.875rem;
            color: #8898aa;
            text-transform: uppercase;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .stat-content .stat-value {
            font-size: 1.625rem;
            font-weight: 600;
            color: #32325d;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            color: white;
        }

        .stat-icon.bg-gradient-red {
            background: linear-gradient(87deg, #f5365c 0, #f56036 100%);
        }

        .stat-icon.bg-gradient-orange {
            background: linear-gradient(87deg, #fb6340 0, #fbb140 100%);
        }

        .stat-icon.bg-gradient-yellow {
            background: linear-gradient(87deg, #ffd600 0, #ffee00 100%);
        }

        .stat-icon.bg-gradient-green {
            background: linear-gradient(87deg, #2dce89 0, #2dcecc 100%);
        }

        .stat-icon.bg-gradient-info {
            background: linear-gradient(87deg, #11cdef 0, #1171ef 100%);
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table thead th {
            padding: 1rem;
            border-bottom: 1px solid #e9ecef;
            color: #8898aa;
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
            text-align: left;
        }

        .table tbody td {
            padding: 1rem;
            border-bottom: 1px solid #e9ecef;
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background: #f6f9fc;
        }

        .btn {
            padding: 0.625rem 1.25rem;
            border: none;
            border-radius: 0.375rem;
            cursor: pointer;
            font-size: 0.875rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: all 0.15s ease;
        }

        .btn-primary {
            background: #5e72e4;
            color: white;
        }

        .btn-primary:hover {
            background: #324cdd;
        }

        .btn-success {
            background: #2dce89;
            color: white;
        }

        .btn-success:hover {
            background: #24a46d;
        }

        .btn-danger {
            background: #f5365c;
            color: white;
        }

        .btn-danger:hover {
            background: #ec0c38;
        }

        .btn-info {
            background: #11cdef;
            color: white;
        }

        .btn-info:hover {
            background: #0da5c0;
        }

        .btn-sm {
            padding: 0.375rem 0.75rem;
            font-size: 0.75rem;
        }

        .alert {
            padding: 1rem 1.5rem;
            border-radius: 0.375rem;
            margin-bottom: 1.5rem;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
            font-weight: 600;
            color: #32325d;
        }

        .form-control {
            width: 100%;
            padding: 0.625rem 0.75rem;
            font-size: 0.875rem;
            line-height: 1.5;
            color: #8898aa;
            background: white;
            border: 1px solid #dee2e6;
            border-radius: 0.375rem;
            transition: all 0.15s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #5e72e4;
            box-shadow: 0 0 0 0.2rem rgba(94, 114, 228, 0.1);
        }

        textarea.form-control {
            min-height: 100px;
            resize: vertical;
        }

        .pagination {
            display: flex;
            list-style: none;
            gap: 0.25rem;
            margin-top: 1.5rem;
        }

        .pagination a,
        .pagination span {
            padding: 0.5rem 0.75rem;
            border: 1px solid #dee2e6;
            border-radius: 0.375rem;
            color: #5e72e4;
            text-decoration: none;
        }

        .pagination .active span {
            background: #5e72e4;
            color: white;
        }

        .pagination a:hover {
            background: #f6f9fc;
        }

        /* Mobile responsiveness */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-250px);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .navbar {
                padding: 1rem;
            }

            .content {
                padding: 1rem;
            }

            .header {
                padding: 4rem 1rem 2rem;
                margin: -1rem -1rem 1rem;
            }

            .table {
                font-size: 0.875rem;
            }

            .table thead th,
            .table tbody td {
                padding: 0.5rem;
            }
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #32325d;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .mobile-menu-btn {
                display: block;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <i class="fas fa-bolt"></i> Laraform Admin
        </div>
        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-chart-pie"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.submissions.index') }}" class="{{ request()->routeIs('admin.submissions.*') ? 'active' : '' }}">
                    <i class="fas fa-envelope"></i>
                    <span>Submissions</span>
                </a>
            </li>
            <li>
                <a href="/">
                    <i class="fas fa-home"></i>
                    <span>View Site</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="main-content">
        <nav class="navbar">
            <button class="mobile-menu-btn" onclick="toggleSidebar()">
                <i class="fas fa-bars"></i>
            </button>
            <div class="navbar-brand">@yield('page-title', 'Dashboard')</div>
            <div class="navbar-user">
                <span>{{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn-logout">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </nav>

        <div class="content">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
        }
    </script>
    @stack('scripts')
</body>
</html>

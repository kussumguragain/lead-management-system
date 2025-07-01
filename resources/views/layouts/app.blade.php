<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Lead Management') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex bg-gray-100 min-vh-100">

    <!-- Sidebar -->
    <nav class="d-flex flex-column flex-shrink-0 p-3 bg-dark text-white" style="width: 250px; min-height: 100vh;">
        <h2 class="fs-4 mb-4">LMS Panel</h2>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link text-white">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('leads.index') }}" class="nav-link text-white">
                    Leads
                </a>
            </li>
            <li>
                <a href="{{ route('reports') }}" class="nav-link text-white">
                    Reports
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    Assign Leads
                </a>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow-1 p-6">
        @yield('content')  <!-- This is where your page content will appear -->
    </main>

    @yield('scripts')  <!-- This is where page-specific scripts will be inserted -->

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Lead Management') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="flex bg-gray-100 min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-900 text-white min-h-screen p-4">
        <h2 class="text-xl font-bold mb-4">LMS Panel</h2>
        <ul class="space-y-3">
            <li><a href="{{ route('dashboard') }}" class="hover:underline">Dashboard</a></li>
            <li><a href="{{ route('leads.index') }}" class="hover:underline">Leads</a></li>
            <li><a href="{{ route('reports') }}" class="hover:underline">Reports</a></li>
            <li><a href="#" class="hover:underline">Assign Leads</a></li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
        @yield('content')
    </main>

</body>
</html>
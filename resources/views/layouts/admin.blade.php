<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex">

    <!-- Sidebar -->
    <div class="w-1/5 bg-gray-800 text-white h-screen p-4">
        <h2 class="text-xl font-bold mb-6">LMS Panel</h2>
        <ul>
            <li><a href="{{ route('dashboard') }}" class="block py-2 hover:bg-gray-700">Dashboard</a></li>
            <li><a href="{{ route('leads.index') }}" class="block py-2 hover:bg-gray-700">Leads</a></li>
            <li><a href="#" class="block py-2 hover:bg-gray-700">Reports</a></li>
            <li><a href="#" class="block py-2 hover:bg-gray-700">Assign Leads</a></li>
        </ul>
    </div>

    <!-- Main Panel -->
    <div class="w-4/5 p-8">
        @yield('content')
    </div>

</body>
</html>

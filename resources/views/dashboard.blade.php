<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <div class="min-h-screen flex">

        <!-- Sidebar -->
        <div class="w-64 bg-gray-900 text-white p-5">
            <h2 class="text-xl font-bold mb-6">Advocate System</h2>

            <ul>
                <li class="mb-3">
                    <a href="/dashboard" class="hover:text-gray-300">Dashboard</a>
                </li>
                <li class="mb-3">
                    <a href="/clients" class="hover:text-gray-300">Clients</a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">

            <!-- Top Bar -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">Dashboard</h1>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                        Logout
                    </button>
                </form>
            </div>

            <!-- Content -->
            <div class="bg-white p-6 rounded shadow">
                <p>Welcome, {{ auth()->user()->name }}</p>
            </div>

        </div>

    </div>

</body>
</html>
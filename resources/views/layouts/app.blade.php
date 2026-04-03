<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="d-flex">

    <!-- Sidebar -->
    <div class="bg-dark text-white p-3" style="width: 250px; min-height: 100vh;">
        <h4>Advocate System</h4>
        <hr>

        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a href="/dashboard" class="nav-link text-white">Dashboard</a>
            </li>
            <li class="nav-item mb-2">
                <a href="/clients" class="nav-link text-white">Clients</a>
            </li>
            <li class="nav-item mb-2">
			    <a href="/cases" class="nav-link text-white">Cases</a>
			</li>

            <li class="nav-item mb-2">
                <a href="/documents" class="nav-link text-white">Documents</a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="flex-grow-1">

        <!-- Top Navbar -->
        <nav class="navbar navbar-light bg-light px-4 d-flex justify-content-between">
            <span class="navbar-brand mb-0 h5">Admin Panel</span>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-danger btn-sm">Logout</button>
            </form>
        </nav>

        <!-- Page Content -->
        <div class="p-4">
            @yield('content')
        </div>

    </div>

</div>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Add Client</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 p-6">

<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">

    <h2 class="text-xl font-bold mb-4">Add Client</h2>

    <!-- Validation Errors -->
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('clients.store') }}">
        @csrf

        <div class="mb-4">
            <label>Name</label>
            <input type="text" name="name" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label>Email</label>
            <input type="email" name="email" class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label>Phone</label>
            <input type="text" name="phone" class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label>Address</label>
            <textarea name="address" class="w-full border p-2 rounded"></textarea>
        </div>

        <button class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
        <a href="/clients" class="ml-2 text-gray-600">Back</a>

    </form>

</div>

</body>
</html>
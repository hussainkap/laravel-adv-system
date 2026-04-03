@extends('dashboard')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Clients</h2>

    <a href="{{ route('clients.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
        Add Client
    </a>

    <table class="w-full mt-4 border">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2">Name</th>
                <th class="p-2">Email</th>
                <th class="p-2">Phone</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
            <tr>
                <td class="p-2">{{ $client->name }}</td>
                <td class="p-2">{{ $client->email }}</td>
                <td class="p-2">{{ $client->phone }}</td>
                <td class="p-2">
                    <a href="{{ route('clients.edit', $client->id) }}" class="text-blue-500">Edit</a>

                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500 ml-2">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
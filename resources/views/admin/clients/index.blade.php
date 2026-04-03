@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h2>Clients</h2>
    <a href="{{ route('clients.create') }}" class="btn btn-primary">Add Client</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th width="150">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clients as $client)
        <tr>
            <td>{{ $client->name }}</td>
            <td>{{ $client->email }}</td>
            <td>{{ $client->phone }}</td>
            <td>
                <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-sm btn-warning">Edit</a>

                <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
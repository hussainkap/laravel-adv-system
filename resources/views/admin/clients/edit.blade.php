@extends('layouts.app')

@section('content')

<h2 class="mb-4">Edit Client</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('clients.update', $client->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" value="{{ $client->name }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" value="{{ $client->email }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" value="{{ $client->phone }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Address</label>
        <textarea name="address" class="form-control">{{ $client->address }}</textarea>
    </div>

    <button class="btn btn-success">Update</button>
    <a href="/clients" class="btn btn-secondary">Back</a>

</form>

@endsection
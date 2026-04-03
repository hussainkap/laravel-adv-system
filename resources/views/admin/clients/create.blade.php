@extends('layouts.app')

@section('content')

<h2 class="mb-4">Add Client</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('clients.store') }}">
    @csrf

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control">
    </div>

    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control">
    </div>

    <div class="mb-3">
        <label>Address</label>
        <textarea name="address" class="form-control"></textarea>
    </div>

    <button class="btn btn-primary">Save</button>
    <a href="/clients" class="btn btn-secondary">Back</a>

</form>

@endsection
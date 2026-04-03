@extends('layouts.app')

@section('content')

<h2 class="mb-4">Add Case</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('cases.store') }}">
    @csrf

    <!-- Client -->
    <div class="mb-3">
        <label>Client</label>
        <select name="client_id" class="form-control" required>
            <option value="">Select Client</option>
            @foreach($clients as $client)
                <option value="{{ $client->id }}">{{ $client->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Title -->
    <div class="mb-3">
        <label>Case Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <!-- Case Number -->
    <div class="mb-3">
        <label>Case Number</label>
        <input type="text" name="case_number" class="form-control">
    </div>

    <!-- Description -->
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control"></textarea>
    </div>

    <!-- Hearing Date -->
    <div class="mb-3">
        <label>Hearing Date</label>
        <input type="date" name="hearing_date" class="form-control">
    </div>

    <!-- Status -->
    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="open">Open</option>
            <option value="pending">Pending</option>
            <option value="closed">Closed</option>
        </select>
    </div>

    <button class="btn btn-primary">Save</button>
    <a href="/cases" class="btn btn-secondary">Back</a>

</form>

@endsection
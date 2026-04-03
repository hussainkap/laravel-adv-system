@extends('layouts.app')

@section('content')

<h2 class="mb-4">Edit Case</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('cases.update', $case->id) }}">
    @csrf
    @method('PUT')

    <!-- Client -->
    <div class="mb-3">
        <label>Client</label>
        <select name="client_id" class="form-control" required>
            @foreach($clients as $client)
                <option value="{{ $client->id }}" 
                    {{ $case->client_id == $client->id ? 'selected' : '' }}>
                    {{ $client->name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Title -->
    <div class="mb-3">
        <label>Case Title</label>
        <input type="text" name="title" value="{{ $case->title }}" class="form-control" required>
    </div>

    <!-- Case Number -->
    <div class="mb-3">
        <label>Case Number</label>
        <input type="text" name="case_number" value="{{ $case->case_number }}" class="form-control">
    </div>

    <!-- Description -->
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control">{{ $case->description }}</textarea>
    </div>

    <!-- Hearing Date -->
    <div class="mb-3">
        <label>Hearing Date</label>
        <input type="date" name="hearing_date" value="{{ $case->hearing_date }}" class="form-control">
    </div>

    <!-- Status -->
    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="open" {{ $case->status == 'open' ? 'selected' : '' }}>Open</option>
            <option value="pending" {{ $case->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="closed" {{ $case->status == 'closed' ? 'selected' : '' }}>Closed</option>
        </select>
    </div>

    <button class="btn btn-success">Update</button>
    <a href="/cases" class="btn btn-secondary">Back</a>

</form>

@endsection
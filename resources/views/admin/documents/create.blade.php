@extends('layouts.app')

@section('content')

<h2 class="mb-4">Upload Document</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('documents.store') }}" enctype="multipart/form-data">
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

    <!-- Case -->
    <div class="mb-3">
        <label>Case (Optional)</label>
        <select name="case_id" class="form-control">
            <option value="">Select Case</option>
            @foreach($cases as $case)
                <option value="{{ $case->id }}">{{ $case->title }}</option>
            @endforeach
        </select>
    </div>

    <!-- File Upload -->
    <div class="mb-3">
        <label>Upload File</label>
        <input type="file" name="file" class="form-control" required>
        <small class="text-muted">Allowed: PDF, JPG, PNG (Max 2MB)</small>
    </div>

    <button class="btn btn-primary">Upload</button>
    <a href="/documents" class="btn btn-secondary">Back</a>

</form>

@endsection
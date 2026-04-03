@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h2>Documents</h2>
    <a href="{{ route('documents.create') }}" class="btn btn-primary">Upload Document</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Client</th>
            <th>Case</th>
            <th>File</th>
            <th>Uploaded</th>
            <th width="180">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($documents as $doc)
        <tr>
            <td>{{ $doc->client->name ?? '-' }}</td>
            <td>{{ $doc->case->title ?? '-' }}</td>
            <td>{{ $doc->file_name }}</td>
            <td>{{ $doc->created_at->format('d M Y') }}</td>
            <td>

                <!-- View -->
                <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank" class="btn btn-sm btn-info">
                    View
                </a>

                <!-- Download -->
                <a href="{{ asset('storage/' . $doc->file_path) }}" download class="btn btn-sm btn-secondary">
                    Download
                </a>

                <!-- Delete -->
                <form action="{{ route('documents.destroy', $doc->id) }}" method="POST" class="d-inline">
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
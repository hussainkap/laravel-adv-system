@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h2>Cases</h2>
    <a href="{{ route('cases.create') }}" class="btn btn-primary">Add Case</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Client</th>
            <th>Title</th>
            <th>Case No</th>
            <th>Hearing Date</th>
            <th>Status</th>
            <th width="160">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cases as $case)
        <tr>
            <td>{{ $case->client->name ?? '-' }}</td>
            <td>{{ $case->title }}</td>
            <td>{{ $case->case_number }}</td>
            <td>{{ $case->hearing_date }}</td>
            <td>
                @if($case->status == 'open')
                    <span class="badge bg-success">Open</span>
                @elseif($case->status == 'pending')
                    <span class="badge bg-warning">Pending</span>
                @else
                    <span class="badge bg-secondary">Closed</span>
                @endif
            </td>
            <td>
                <a href="{{ route('cases.edit', $case->id) }}" class="btn btn-sm btn-warning">Edit</a>

                <form action="{{ route('cases.destroy', $case->id) }}" method="POST" class="d-inline">
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
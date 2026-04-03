@extends('layouts.app')

@section('content')

<div class="card p-4">
    <h4>Welcome, {{ auth()->user()->name }}</h4>
</div>

@endsection
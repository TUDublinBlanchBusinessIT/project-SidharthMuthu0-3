@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Guests</h1>
        <a class="btn btn-primary" href="{{ route('guests.create') }}">+ Add New</a>
    </div>

    @include('flash::message')

    <div class="card shadow-sm">
        <div class="card-body">
            @include('guests.table')
        </div>
    </div>
@endsection

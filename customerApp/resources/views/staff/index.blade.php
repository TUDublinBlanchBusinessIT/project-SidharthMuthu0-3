@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Staff</h1>
        <a class="btn btn-primary" href="{{ route('staff.create') }}">+ Add New</a>
    </div>

    @include('flash::message')

    <div class="card shadow-sm">
        <div class="card-body">
            @include('staff.table')
        </div>
    </div>
@endsection

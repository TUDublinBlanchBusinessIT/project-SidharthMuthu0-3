@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Staff List</h1>
    <a href="{{ route('staff.create') }}" class="btn btn-success">+ Add New Staff</a>
</div>

{{-- 🟢 Success message --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

{{-- 🔴 Deleted message --}}
@if(session('deleted'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('deleted') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

{{-- ❌ Error message --}}
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card shadow-sm">
    <div class="card-body p-0">
        @include('staff.table')
    </div>
</div>
@endsection

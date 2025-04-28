@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Guest List</h1>
        <a href="{{ route('guests.create') }}" class="btn btn-success">+ Add New Guest</a>
    </div>

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('deleted'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('deleted') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($guests->count())
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-bordered table-hover text-center mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>National ID</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($guests as $guest)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $guest->first_name }} {{ $guest->last_name }}</td>
                                <td>{{ $guest->phone_number }}</td>
                                <td>{{ $guest->email }}</td>
                                <td>{{ $guest->national_id }}</td>
                                <td>{{ $guest->created_at->format('Y-m-d') }}</td>
                                <td class="d-flex justify-content-center gap-2">

                                    {{-- Edit Button --}}
                                    <form action="{{ route('guests.edit', $guest->id) }}" method="GET" style="display:inline;">
                                        <button type="submit" class="btn btn-sm btn-primary">Edit</button>
                                    </form>

                                    {{-- Delete Button --}}
                                    <form method="POST" action="{{ route('guests.destroy', $guest->id) }}" onsubmit="return confirm('Are you sure you want to delete this guest?');" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="alert alert-warning">No guests found.</div>
    @endif
@endsection

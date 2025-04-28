@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Staff List</h1>
        <a href="{{ route('staff.create') }}" class="btn btn-success">+ Add New Staff</a>
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

    @if($staff->count())
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-bordered table-hover text-center mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Position</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Hire Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($staff as $member)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $member->first_name }}</td>
                                <td>{{ $member->last_name }}</td>
                                <td>{{ $member->position }}</td>
                                <td>{{ $member->phone_number }}</td>
                                <td>{{ $member->email }}</td>
                                <td>{{ $member->hire_date }}</td>
                                <td class="d-flex justify-content-center gap-2">

                                    {{-- Edit Button --}}
                                    <form action="{{ route('staff.edit', $member->id) }}" method="GET" style="display:inline;">
                                        <button type="submit" class="btn btn-sm btn-primary">Edit</button>
                                    </form>

                                    {{-- Delete Button --}}
                                    <form method="POST" action="{{ route('staff.destroy', $member->id) }}" onsubmit="return confirm('Are you sure you want to delete this staff member?');" style="display:inline;">
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
        <div class="alert alert-warning">No staff members found.</div>
    @endif
@endsection

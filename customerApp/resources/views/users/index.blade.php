@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">User Management</h1>
        <a href="{{ route('users.create') }}" class="btn btn-success">+ Add New User</a>
    </div>

    {{-- 🟢 Success message (create/update) --}}
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

    @if($users->count())
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-bordered table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name & Email</th>
                            <th>Role</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>
                                    <strong>{{ $user->name }}</strong><br>
                                    <small>{{ $user->email }}</small>
                                </td>
                                <td><span class="badge bg-info text-dark">{{ ucfirst($user->role) }}</span></td>
                                <td>{{ $user->created_at->format('Y-m-d H:i') }}</td>
                                <td class="d-flex gap-2">
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">
                                        Edit Role
                                    </a>

                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
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
        <div class="alert alert-warning">No users found.</div>
    @endif
@endsection

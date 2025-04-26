@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Room List</h1>
        <a href="{{ route('rooms.create') }}" class="btn btn-success">+ Add New Room</a>
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

    @if($rooms->count())
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-bordered table-hover text-center mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Room Number</th>
                            <th>Room Type</th>
                            <th>Price (€)</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rooms as $room)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $room->room_number }}</td>
                                <td>{{ $room->room_type }}</td>
                                <td>€{{ number_format($room->price, 2) }}</td>
                                <td>
                                    <span class="badge {{ $room->status === 'available' ? 'bg-success' : 'bg-secondary' }}">
                                        {{ ucfirst($room->status ?? 'Unavailable') }}
                                    </span>
                                </td>
                                <td>{{ $room->created_at->format('Y-m-d') }}</td>
                                <td class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-sm btn-primary">
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('rooms.destroy', $room->id) }}" onsubmit="return confirm('Are you sure you want to delete this room?');">
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
        <div class="alert alert-warning">No rooms found.</div>
    @endif
@endsection

@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Room List</h1>
        <a href="{{ route('rooms.create') }}" class="btn btn-success">+ Add New Room</a>
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

    @if($rooms->count())
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-bordered table-hover text-center mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Room Number</th>
                            <th>Room Type</th>
                            <th>Price</th>
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
                                    <span class="badge {{ $room->is_available ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $room->is_available ? 'Available' : 'Unavailable' }}
                                    </span>
                                </td>
                                <td>{{ $room->created_at->format('Y-m-d') }}</td>
                                <td class="d-flex justify-content-center gap-2">

                                    {{-- Edit Button --}}
                                    <form action="{{ route('rooms.edit', $room->id) }}" method="GET" style="display:inline;">
                                        <button type="submit" class="btn btn-sm btn-primary">Edit</button>
                                    </form>

                                    {{-- Delete Button --}}
                                    <form method="POST" action="{{ route('rooms.destroy', $room->id) }}" onsubmit="return confirm('Are you sure you want to delete this room?');" style="display:inline;">
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

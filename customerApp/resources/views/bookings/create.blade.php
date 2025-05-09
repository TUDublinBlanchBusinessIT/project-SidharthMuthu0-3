@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h4 mb-0">Add New Booking</h2>
        <a href="{{ route('bookings.index') }}" class="btn btn-secondary">← Back to Bookings</a>
    </div>

    {{-- Display Validation Errors --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Booking Form --}}
    <div class="card shadow-sm">
        <div class="card-body">
            <form method="POST" action="{{ route('bookings.store') }}">
                @csrf

                {{-- Guest Select Dropdown --}}
                <div class="mb-3">
                    <label for="guest_id" class="form-label">Guest</label>
                    <select name="guest_id" id="guest_id" class="form-select" required>
                        <option value="">-- Select Guest --</option>
                        @foreach($guests as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Room Number --}}
                <div class="mb-3">
                    <label for="room_number" class="form-label">Room Number</label>
                    <input type="number" name="room_number" id="room_number" class="form-control" required>
                </div>

                {{-- Check In Date --}}
                <div class="mb-3">
                    <label for="check_in_date" class="form-label">Check-In Date</label>
                    <input type="date" name="check_in_date" id="check_in_date" class="form-control" required>
                </div>

                {{-- Check Out Date --}}
                <div class="mb-3">
                    <label for="check_out_date" class="form-label">Check-Out Date</label>
                    <input type="date" name="check_out_date" id="check_out_date" class="form-control" required>
                </div>

                {{-- Payment Status --}}
                <div class="mb-3">
                    <label for="payment_status" class="form-label">Payment Status</label>
                    <select name="payment_status" id="payment_status" class="form-select" required>
                        <option value="">-- Select Payment Status --</option>
                        <option value="paid">Paid</option>
                        <option value="pending">Pending</option>
                        <option value="failed">Failed</option>
                    </select>
                </div>

                {{-- Submit Buttons --}}
                <div class="d-flex justify-content-between">
                    <a href="{{ route('bookings.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save Booking</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

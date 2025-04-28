@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h4 mb-0">Edit Booking</h2>
        <a href="{{ route('bookings.index') }}" class="btn btn-secondary">← Back to Bookings</a>
    </div>

    {{-- Display Validation Errors --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Edit Booking Form --}}
    <div class="card shadow-sm">
        <div class="card-body">
            <form method="POST" action="{{ route('bookings.update', $booking->id) }}">
                @csrf
                @method('PATCH')

                {{-- Guest Dropdown --}}
                <div class="mb-3">
                    <label for="guest_id" class="form-label">Guest</label>
                    <select name="guest_id" id="guest_id" class="form-select" required>
                        @foreach($guests as $id => $name)
                            <option value="{{ $id }}" {{ $booking->guest_id == $id ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Room Number --}}
                <div class="mb-3">
                    <label for="room_number" class="form-label">Room Number</label>
                    <input type="number" name="room_number" id="room_number" class="form-control" value="{{ $booking->room_number }}" required>
                </div>

                {{-- Check In Date --}}
                <div class="mb-3">
                    <label for="check_in_date" class="form-label">Check-In Date</label>
                    <input type="date" name="check_in_date" id="check_in_date" class="form-control" value="{{ $booking->check_in_date }}" required>
                </div>

                {{-- Check Out Date --}}
                <div class="mb-3">
                    <label for="check_out_date" class="form-label">Check-Out Date</label>
                    <input type="date" name="check_out_date" id="check_out_date" class="form-control" value="{{ $booking->check_out_date }}" required>
                </div>

                {{-- Payment Status (Dropdown) --}}
                <div class="mb-3">
                    <label for="payment_status" class="form-label">Payment Status</label>
                    <select name="payment_status" id="payment_status" class="form-select" required>
                        <option value="paid" {{ $booking->payment_status === 'paid' ? 'selected' : '' }}>Paid</option>
                        <option value="pending" {{ $booking->payment_status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="failed" {{ $booking->payment_status === 'failed' ? 'selected' : '' }}>Failed</option>
                    </select>
                </div>

                {{-- Submit Buttons --}}
                <div class="d-flex justify-content-between">
                    <a href="{{ route('bookings.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Booking</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

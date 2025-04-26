@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Add New Booking</h2>

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

    {{-- Booking Form --}}
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
            <input type="text" name="payment_status" id="payment_status" class="form-control" required>
        </div>

        {{-- Submit Button --}}
        <div class="d-flex justify-content-between">
            <a href="{{ route('bookings.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Save Booking</button>
        </div>
    </form>
</div>
@endsection

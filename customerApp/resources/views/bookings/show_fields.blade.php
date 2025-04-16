<!-- Guest Id Field -->
<div class="form-group">
    {!! Form::label('guest_id', 'Guest Id:') !!}
    <p>{!! $booking->guest_id !!}</p>
</div>

<!-- Room Number Field -->
<div class="form-group">
    {!! Form::label('room_number', 'Room Number:') !!}
    <p>{!! $booking->room_number !!}</p>
</div>

<!-- Check In Date Field -->
<div class="form-group">
    {!! Form::label('check_in_date', 'Check In Date:') !!}
    <p>{!! $booking->check_in_date !!}</p>
</div>

<!-- Check Out Date Field -->
<div class="form-group">
    {!! Form::label('check_out_date', 'Check Out Date:') !!}
    <p>{!! $booking->check_out_date !!}</p>
</div>

<!-- Payment Status Field -->
<div class="form-group">
    {!! Form::label('payment_status', 'Payment Status:') !!}
    <p>{!! $booking->payment_status !!}</p>
</div>


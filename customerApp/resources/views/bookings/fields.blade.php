<!-- Guest Id Field -->
<div class="form-group col-sm-6 mb-3">
    {!! Form::label('guest_id', 'Guest:') !!}
    {!! Form::select('guest_id', $guests, null, ['class' => 'form-select', 'placeholder' => 'Select Guest']) !!}
</div>

<!-- Room Number Field -->
<div class="form-group col-sm-6 mb-3">
    {!! Form::label('room_number', 'Room Number:') !!}
    {!! Form::number('room_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Check In Date Field -->
<div class="form-group col-sm-6 mb-3">
    {!! Form::label('check_in_date', 'Check In Date:') !!}
    {!! Form::date('check_in_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Check Out Date Field -->
<div class="form-group col-sm-6 mb-3">
    {!! Form::label('check_out_date', 'Check Out Date:') !!}
    {!! Form::date('check_out_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Payment Status Field -->
<div class="form-group col-sm-6 mb-3">
    {!! Form::label('payment_status', 'Payment Status') !!}
    {!! Form::select('payment_status', [
        'paid' => 'Paid',
        'pending' => 'Pending',
        'failed' => 'Failed'
    ], null, ['class' => 'form-select', 'placeholder' => 'Select Payment Status']) !!}
</div>

<!-- Submit and Cancel -->
<div class="form-group col-12 d-flex justify-content-between mt-4">
    <a href="{{ route('bookings.index') }}" class="btn btn-outline-secondary">Cancel</a>
    {!! Form::submit('Save Booking', ['class' => 'btn btn-primary']) !!}
</div>

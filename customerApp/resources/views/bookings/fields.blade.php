<!-- Guest Dropdown -->
<div class="form-group col-sm-6">
    {!! Form::label('guest_id', 'Guest') !!}
    {!! Form::select('guest_id', $guests, null, ['class' => 'form-control', 'placeholder' => '-- Select Guest --', 'required']) !!}
</div>

<!-- Room Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('room_number', 'Room Number:') !!}
    {!! Form::number('room_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Check In Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('check_in_date', 'Check In Date:') !!}
    {!! Form::date('check_in_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Check Out Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('check_out_date', 'Check Out Date:') !!}
    {!! Form::date('check_out_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Payment Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_status', 'Payment Status:') !!}
    {!! Form::text('payment_status', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Buttons -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('bookings.index') !!}" class="btn btn-secondary">Cancel</a>
</div>

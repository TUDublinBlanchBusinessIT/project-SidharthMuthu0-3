<!-- Room Number Field -->
<div class="form-group">
    {!! Form::label('room_number', 'Room Number:') !!}
    <p>{!! $room->room_number !!}</p>
</div>

<!-- Room Type Field -->
<div class="form-group">
    {!! Form::label('room_type', 'Room Type:') !!}
    <p>{!! $room->room_type !!}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', 'Price:') !!}
    <p>{!! $room->price !!}</p>
</div>

<!-- Is Available Field -->
<div class="form-group">
    {!! Form::label('is_available', 'Is Available:') !!}
    <p>{!! $room->is_available !!}</p>
</div>


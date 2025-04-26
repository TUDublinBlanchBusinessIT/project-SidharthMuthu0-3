<!-- Room Number -->
<div class="mb-3">
    {!! Form::label('room_number', 'Room Number', ['class' => 'form-label']) !!}
    {!! Form::number('room_number', null, ['class' => 'form-control', 'required' => true]) !!}
</div>

<!-- Room Type -->
<div class="mb-3">
    {!! Form::label('room_type', 'Room Type', ['class' => 'form-label']) !!}
    {!! Form::text('room_type', null, ['class' => 'form-control', 'required' => true]) !!}
</div>

<!-- Price -->
<div class="mb-3">
    {!! Form::label('price', 'Price ($)', ['class' => 'form-label']) !!}
    {!! Form::number('price', null, ['class' => 'form-control', 'step' => '0.01', 'required' => true]) !!}
</div>

<!-- Is Available -->
<div class="mb-3">
    {!! Form::label('is_available', 'Available?', ['class' => 'form-label d-block']) !!}
    <div class="form-check form-switch">
        {!! Form::hidden('is_available', 0) !!}
        {!! Form::checkbox('is_available', 1, null, ['class' => 'form-check-input', 'id' => 'is_available']) !!}
        <label class="form-check-label" for="is_available">Yes</label>
    </div>
</div>

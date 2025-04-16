<!-- Room Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('room_number', 'Room Number:') !!}
    {!! Form::number('room_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Room Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('room_type', 'Room Type:') !!}
    {!! Form::text('room_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Available Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_available', 'Is Available:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_available', false) !!}
        {!! Form::checkbox('is_available', 1, null) !!} $VALUE$
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('rooms.index') !!}" class="btn btn-default">Cancel</a>
</div>

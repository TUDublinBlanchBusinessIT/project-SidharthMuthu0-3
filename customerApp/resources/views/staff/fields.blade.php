<!-- First Name Field -->
<div class="form-group mb-3">
    {!! Form::label('first_name', 'First Name:') !!}
    {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Last Name Field -->
<div class="form-group mb-3">
    {!! Form::label('last_name', 'Last Name:') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Position Field -->
<div class="form-group mb-3">
    {!! Form::label('position', 'Position:') !!}
    {!! Form::text('position', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Number Field -->
<div class="form-group mb-3">
    {!! Form::label('phone_number', 'Phone Number:') !!}
    {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group mb-3">
    {!! Form::label('email', 'Email Address:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Hire Date Field -->
<div class="form-group mb-3">
    {!! Form::label('hire_date', 'Hire Date:') !!}
    {!! Form::date('hire_date', null, ['class' => 'form-control']) !!}
</div>

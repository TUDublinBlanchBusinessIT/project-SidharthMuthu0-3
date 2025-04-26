@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Add New Staff</h1>
    <a href="{{ route('staff.index') }}" class="btn btn-secondary">← Back to Staff List</a>
</div>

{{-- 🔥 Display errors if any --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Oops!</strong> Please correct the following issues:<br><br>
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card shadow-sm">
    <div class="card-body">
        {!! Form::open(['route' => 'staff.store']) !!}

            @include('staff.fields')

            <div class="mt-4 d-flex justify-content-between">
                <a href="{{ route('staff.index') }}" class="btn btn-outline-secondary">Cancel</a>
                {!! Form::submit('Save Staff', ['class' => 'btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}
    </div>
</div>
@endsection

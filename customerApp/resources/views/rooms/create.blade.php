@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">Add New Room</h1>
            <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Back to Room List</a>
        </div>

        {{-- Display Validation Errors --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                {!! Form::open(['route' => 'rooms.store']) !!}

                    @include('rooms.fields') {{-- Keep using your fields partial here --}}

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Cancel</a>
                        {!! Form::submit('Save Room', ['class' => 'btn btn-primary']) !!}
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

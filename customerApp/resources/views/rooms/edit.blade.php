@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Edit Room</h1>
        <a href="{{ route('rooms.index') }}" class="btn btn-secondary">← Back to Rooms</a>
    </div>

    @include('flash::message')

    {{-- Display validation errors --}}
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
            {!! Form::model($room, ['route' => ['rooms.update', $room->id], 'method' => 'patch']) !!}

                @include('rooms.fields') {{-- This is your nice upgraded fields.blade.php --}}

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Cancel</a>
                    {!! Form::submit('Update Room', ['class' => 'btn btn-primary']) !!}
                </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection

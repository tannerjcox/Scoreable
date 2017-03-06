@extends('layouts.account')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Your games</div>
        <div class="panel-body">
            @foreach(Auth::user()->games as $sport)
                {{ $sport->name }}
                {!! Form::button('Create Game', ['class' => 'btn btn-primary btn-sm', 'data-create-game']) !!}
                <br>
            @endforeach
            <br>
                <a href="{{ route('games.create') }}" class="btn btn-success btn-sm">Create Game</a>
            {!! Form::button('Create Sport', ['class' => 'btn btn-primary btn-sm', 'data-create-sport']) !!}

        </div>
    </div>
@endsection

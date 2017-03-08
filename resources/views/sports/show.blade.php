@extends('layouts.account')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">{{ $sport->name }} Games <a class="pull-right" href="{{ route('sports.edit', $sport->id) }}"><i class="glyphicon glyphicon-edit"></i> </a> </div>
        <div class="panel-body">
            @foreach(Auth::user()->games()->whereSportId($sport->id)->orderBy('score', 'desc')->get() as $game)
                <span>{{ $game->score }}</span> by
                <span>{{ $game->user->name }}</span> on
                <span>{{ $game->created_at->toDayDateTimeString() }}</span>
                <br>
            @endforeach
        </div>
        <div class="panel-footer">
            <a href="{{ route('games.create', ['sport_id' => $sport->id]) }}" class="btn btn-primary">Create New Game</a>
        </div>
    </div>
@endsection

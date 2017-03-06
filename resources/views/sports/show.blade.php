@extends('layouts.account')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">{{ $sport->name }} games <a class="pull-right" href="{{ route('sports.edit', $sport->id) }}"><i class="glyphicon glyphicon-edit"></i> </a> </div>
        <div class="panel-body">
            @foreach(Auth::user()->games()->whereSportId($sport->id)->get() as $game)
                <span>{{ $game->created_at->toDayDateTimeString() }}</span> :
                <span>{{ $game->score }}</span><br>
            @endforeach
        </div>
        <div class="panel-footer">
            <a href="{{ route('games.create', ['sport_id' => $sport->id]) }}" class="btn btn-primary">Create New Game</a>
        </div>
    </div>
@endsection

@extends('layouts.account')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">{{ $user->name }} <small>since {{ $user->created_at }}</small> <a class="pull-right" href="{{ route('users.edit', $user->id) }}"><i class="glyphicon glyphicon-edit"></i> </a></div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <h4>Teams</h4>
                    @foreach($user->teams as $team)
                        <div class="row col-xs-12">{{ $team->name }}</div>
                    @endforeach
                </div>
                <div class="col-md-4">
                    <h4>Sports</h4>
                    @foreach($user->sports as $sport)
                        <div class="row col-xs-12">{{ $sport->name }}</div>
                    @endforeach
                </div>
                <div class="col-md-4">
                    <h4>Scores</h4>
                    @foreach($user->games as $game)
                        <div class="row col-xs-12">
                            @if(!isset($name) || $name != $game->sport->name)
                                <strong>{{ $name = $game->sport->name }}</strong><br>
                            @endif
                            <span>{{ $game->score }}</span> on
                            <span>{{ $game->created_at->toDayDateTimeString() }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-xs-6">
                    {{--                    <a href="{{ route('games.create', ['sport_id' => $sport->id]) }}" class="btn btn-primary">New {{$sport->name }} Game</a>--}}
                </div>
                <div class="col-xs-6">
                    {{--<a href="{{ route('users.create', ['sport_id' => $sport->id]) }}" class="btn btn-primary">Add User</a>--}}
                </div>
            </div>
        </div>
    </div>
@endsection

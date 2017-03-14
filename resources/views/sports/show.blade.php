@extends('layouts.account')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">{{ $sport->name }} Games <a class="pull-right" href="{{ route('sports.edit', $sport->id) }}"><i class="glyphicon glyphicon-edit"></i> </a></div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <h4>Scores</h4>
                    @foreach($games as $game)
                        <div class="row col-xs-12">
                            <span>{{ $game->score }}</span> by
                            <span>{{ $game->user->name }}</span> on
                            <span>{{ $game->created_at->toDayDateTimeString() }}</span>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-6">
                    <h4>Sport Participants</h4>
                    @foreach($users as $user)
                        <div class="row col-xs-12">{{ $user->name }}</div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-xs-6">
                    <a href="{{ route('games.create', ['sport_id' => $sport->id]) }}" class="btn btn-primary">New {{$sport->name }} Game</a>
                </div>
                <div class="col-xs-6">
                    {{--<a href="{{ route('users.create', ['sport_id' => $sport->id]) }}" class="btn btn-primary">Add User</a>--}}
                </div>
            </div>
        </div>
    </div>
@endsection

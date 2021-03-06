@extends('layouts.account')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Your Sports</div>
        <div class="panel-body">
            @foreach(Auth::user()->sports as $sport)
                <div class="row">
                    <div class="col-xs-3">
                        {{ $sport->name }}
                    </div>
                    <div class="col-xs-3">
                        {{ $sport->users()->count() }} users
                    </div>
                    <div class="col-xs-3">
                        {{ $sport->games()->count() }} games
                    </div>
                    <div class="col-xs-3">
                        <a href="{{ route('games.create', ['sport_id' => $sport->id]) }}" class="btn btn-primary">Add Game</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="panel-footer">
            {{ link_to_route('sports.create', 'Create Sport', [], ['class' => 'btn btn-sm btn-success']) }}
        </div>
    </div>
@endsection

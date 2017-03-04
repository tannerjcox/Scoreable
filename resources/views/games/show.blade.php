@extends('layouts.account')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">{{ $sport->name }}</div>
        <div class="panel-body">
            <a href="{{ route('games.create', ['sport_id' => $sport->id]) }}" class="btn btn-success btn-sm">Create Game</a>
        </div>
    </div>
@endsection

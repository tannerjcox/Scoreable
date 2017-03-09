@extends('layouts.account')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">My Teams</div>
        <div class="panel-body">
            @foreach(Auth::user()->teams as $team)
                {{ link_to_route('teams.show', $team->name, ['id' => $team->id]) }}
                <br>
            @endforeach
        </div>
        <div class="panel-footer">
            <a href="{{ route('teams.create') }}" class="btn btn-success btn-sm">Create Team</a>
        </div>
    </div>
@endsection

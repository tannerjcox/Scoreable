@extends('layouts.account')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Your Sports</div>
        <div class="panel-body">
            @foreach(Auth::user()->teams as $team)
                {{ link_to_route('teams.show', $team->name) }}
                <br>
            @endforeach
            <br>
            <a href="{{ route('teams.create') }}" class="btn btn-success btn-sm">Create Team</a>

        </div>
    </div>
@endsection

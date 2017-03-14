@extends('layouts.account')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">{{ $team->name }} Users <a class="pull-right" href="{{ route('teams.edit', $team->id) }}"><i class="glyphicon glyphicon-edit"></i> </a> </div>
        <div class="panel-body">
            @foreach($team->users as $user)
                <span>{{ $user->name }}</span>
                <br>
            @endforeach
        </div>
        <div class="panel-footer">
        </div>
    </div>
@endsection

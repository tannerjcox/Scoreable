@extends('layouts.account')
@section('content')
    <div class="panel panel-default">
        @if(isset($sport))
            <div class="panel-heading">Create a game for {{ $sport->name }}</div>
            <div class="panel-body">
                {!! BootForm::open()->action(route('games.store'))->put() !!}
                <div class="col-xs-4">
                    {!! BootForm::text('Score', 'score') !!}
                </div>
                <div class="col-xs-4">
                    {!! BootForm::select('User', 'user_id')->options($sport->users->pluck('name', 'id')) !!}
                </div>
            </div>
            <div class="panel-footer">
                {!! BootForm::hidden('sport_id', $sport->id) !!}
                {!! BootForm::submit('Save', 'btn-primary') !!}
            </div>
            {!! BootForm::close() !!}
        @else
            No game set, it seems you've lost your way.
        @endif
    </div>
@endsection

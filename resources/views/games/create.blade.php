@extends('layouts.account')
@section('content')
    {!! BootForm::open()->action(route('games.store')) !!}
    <div class="panel panel-default">
        <div class="panel-heading">Create a game for {{ $sport->name }}</div>
        <div class="panel-body">
            <div class="col-xs-4">
                {!! BootForm::text('Score', 'score') !!}
            </div>
            <div class="col-xs-4">
                {!! BootForm::select('User', 'user_id')->options($sport->users->pluck('name', 'id')) !!}
            </div>
        </div>
        <div class="panel-footer">
            {!! BootForm::hidden('sport_id')->value($sport->id) !!}
            {!! BootForm::submit('Save', 'btn-primary') !!}
        </div>
        {!! BootForm::close() !!}
    </div>
@endsection

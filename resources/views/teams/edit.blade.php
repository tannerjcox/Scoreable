@extends('layouts.account')
@section('content')
    @if(isset($team))
        {!! BootForm::open()->action(route('teams.update', $team->id))->put() !!}
        {!! BootForm::bind($team) !!}
    @else
        {!! BootForm::open()->action(route('teams.store')) !!}
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">{{ isset($team) ? 'Edit ' . $team->name : 'New Team' }}</div>
        <div class="panel-body">
            <div class="col-md-6 row">
                {!! BootForm::text('Name', 'name') !!}
            </div>
            <div class="col-md-6">
                @if((Auth::user()->isAdmin() || ($team && $team->creator()->id == Auth::user()->id)) && $users)
                    {!! BootForm::select(isset($team) ? 'Add User to Team' : 'Team Captain', 'user_id')->options(array_merge(['0' => 'Select A User'], $users->pluck('name', 'id')->all())) !!}
                @endif
            </div>
        </div>
        <div class="panel-footer">
            {!! BootForm::submit('Save')->class('btn btn-success') !!}
        </div>
    </div>
    {!! BootForm::close() !!}

@endsection

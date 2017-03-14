@extends('layouts.account')
@section('content')
    @if(isset($user))
        {!! BootForm::open()->action(route('users.update', $user->id))->put() !!}
        {!! BootForm::bind($user) !!}
    @else
        {!! BootForm::open()->action(route('users.store')) !!}
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">{{ isset($user) ? 'Edit ' . $user->name : 'New User' }}</div>
        <div class="panel-body">
            <div class="col-md-6 row">
                {!! BootForm::text('Name', 'name') !!}
                {!! BootForm::text('Email', 'email') !!}
            </div>
        </div>
        <div class="panel-footer">
            {!! BootForm::submit('Save')->class('btn btn-success') !!}
        </div>
    </div>
    {!! BootForm::close() !!}
@endsection

@extends('layouts.account')
@section('content')
    @if(isset($sport))
        {!! BootForm::open()->action(route('sports.update', $sport->id))->put() !!}
        {!! BootForm::bind($sport) !!}
    @else
        {{--{!! BootForm::openHorizontal(['sm' => [4, 8],'lg' => [2, 10]])->action(route('sports.create')) !!}--}}
        {!! BootForm::open()->action(route('sports.store')) !!}
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">{{ isset($sport) ? 'Edit ' . $sport->name : 'New Sport' }}</div>
        <div class="panel-body">
            <div class="col-md-6">
                {!! BootForm::text('Name', 'name') !!}
            </div>
            <div class="col-md-6">
                @if(Auth::user()->isAdmin() && $users  && !$sport)
                    {!! BootForm::select('User', 'user_id')->options(array_merge(['0' => 'Select A User'], $users->pluck('name', 'id')->all()))->defaultValue(isset($sport) ? $sport->creator() : 0) !!}
                @endif
            </div>
        </div>
        <div class="panel-footer">
            {!! BootForm::submit('Save')->class('btn btn-success') !!}
        </div>
    </div>
    {!! BootForm::close() !!}

@endsection

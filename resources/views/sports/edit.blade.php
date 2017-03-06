@extends('layouts.account')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">{{ isset($sport) ? 'Edit ' . $sport->name : 'New Sport' }}</div>
        <div class="panel-body">
            @if(isset($sport))
                {!! BootForm::open()->action(route('sports.update', $sport->id))->put() !!}
                {!! BootForm::bind($sport) !!}
            @else
                {{--{!! BootForm::openHorizontal(['sm' => [4, 8],'lg' => [2, 10]])->action(route('sports.create')) !!}--}}
                {!! BootForm::open()->action(route('sports.store')) !!}
            @endif
            {!! BootForm::text('Name', 'name') !!}
            {!! BootForm::textarea('Description', 'description') !!}
            <br>
            {!! \AdamWathan\BootForms\Facades\BootForm::submit('Save') !!}
            {!! BootForm::close() !!}

        </div>
    </div>
@endsection

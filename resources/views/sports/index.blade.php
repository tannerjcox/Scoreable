@extends('layouts.account')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Your Sports</div>
        <div class="panel-body">
            @foreach(Auth::user()->sports as $sport)
                {{ $sport->name }}
                {!! Form::button('Create Game', ['class' => 'btn btn-primary btn-sm', 'data-create-game']) !!}
                <br>
            @endforeach
        </div>
        <div class="panel-footer">
            {{ link_to_route('sports.create', 'Create Sport', [], ['class' => 'btn btn-sm btn-success']) }}
        </div>
    </div>
@endsection

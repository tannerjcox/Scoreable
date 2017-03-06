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
            <br>
            <a href="{{ route('sports.create') }}" class="btn btn-success btn-sm">Create Sport</a>

        </div>
    </div>
@endsection

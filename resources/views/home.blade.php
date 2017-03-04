@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <aside class="col-md-3">
                You have {{ Auth::user()->games()->count() ?: 'no' }} game(s)<br>
                {!! Form::button('Create Game', ['class' => 'btn btn-primary', 'data-create-game']) !!}
            </aside>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <div class="panel-body">
                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

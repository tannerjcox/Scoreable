@extends('layouts.account')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Users</div>
        <div class="panel-body">
            @foreach($users as $user)
                <div class="row">
                    <div class="col-xs-3">
                        {{ link_to_route('users.show', $user->name, ['id' => $user->id]) }}
                    </div>
                    <div class="col-xs-3">
                        {{ $user->teams()->count() }} teams
                    </div>
                    <div class="col-xs-3">
                        {{ $user->sports()->count() }} sports
                    </div>
                    <div class="col-xs-3">
                        {{ $user->games()->count() }} games
                    </div>
                </div>
            @endforeach
        </div>
        <div class="panel-footer">
{{--            {{ link_to_route('sports.create', 'Create Sport', [], ['class' => 'btn btn-sm btn-success']) }}--}}
        </div>
    </div>
    {!! $users->links() !!}
@endsection

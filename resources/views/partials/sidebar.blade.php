<aside class="main-sidebar col-md-2">
    <div class="col-md-12 col-sm-6 col-xs-6">
        <div>
            <a href="{{ route('sports.index') }}">
                <strong><i class="fa fa-gamepad"></i> My Sports </strong>
            </a>
            <a data-toggle="collapse" role="button" href="#collapseSports" aria-expanded="false" aria-controls="collapseTeams">
                <i class="fa fa-caret-down"></i>
            </a>
        </div>
        <div class="collapse" id="collapseSports">
            @foreach(Auth::user()->sports as $sport)
                <div>
                    <a href="{{ route('sports.show', $sport->id) }}">{{ $sport->name }}</a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-md-12 col-sm-6 col-xs-6">
        <div>
            <a href="{{ route('teams.index') }}">
                <strong><i class="fa fa-users"></i> My Teams </strong>
            </a>
            <a data-toggle="collapse" role="button" href="#collapseTeams" aria-expanded="false" aria-controls="collapseTeams">
                <i class="fa fa-caret-down"></i>
            </a>
        </div>
        <div class="collapse" id="collapseTeams">
            @foreach(Auth::user()->teams as $team)
                <div>
                    {{ link_to_route('teams.show', $team->name, [$team->id]) }}
                </div>
            @endforeach
        </div>
    </div>
</aside>
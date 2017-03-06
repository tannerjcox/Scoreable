<aside class="main-sidebar col-md-2">
        <div class="panel-heading">
           <strong>My Sports</strong>
        </div>
    @foreach(Auth::user()->sports as $sport)
        <div class="panel-heading">
            <a href="{{ route('sports.show', $sport->id) }}" class="">{{ $sport->name }}</a>
        </div>
    @endforeach
    <a href="{{ route('sports.create') }}" class="btn btn-primary btn-sm">Create Sport</a>
</aside>
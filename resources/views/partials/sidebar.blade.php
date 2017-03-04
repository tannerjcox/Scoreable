<aside class="main-sidebar col-md-2">
        <div class="panel-heading">
            {{ Auth::user()->name }}
        </div>
    @foreach(Auth::user()->sports as $sport)
        <div class="panel-heading">
            <a href="{{ route('sports.show', $sport->id) }}" class="">{{ $sport->name }}</a>
        </div>
    @endforeach
</aside>
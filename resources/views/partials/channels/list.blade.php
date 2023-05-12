<ul>
    @if(isset($channels))
        @foreach($channels as $channel)
            <li>{{$channel->name}}</li>
        @endforeach
    @endif
</ul>

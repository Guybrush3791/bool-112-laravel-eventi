@extends('layouts.app')

@section('content')

    <div class="text-center">
        <h1>Events</h1>
        <a href="{{ route('events.create') }}">CREATE A NEW EVENT</a>
        <br><br>
        <ul>
            @foreach($events as $event)
                <li>
                    <a href="{{ route('events.show', $event -> id) }}">
                        {{ $event -> title }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

@endsection

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Event;
use App\Models\Tag;

class EventController extends Controller
{

    public function index()
    {
        $events = Event :: all();

        return view('events.index', compact('events'));
    }

    public function create()
    {
        $tags = Tag :: all();

        return view('events.create', compact('tags'));
    }

    public function store(Request $request)
    {
        // get auth user
        $user = Auth :: user();

        $data = $request -> all();

        $event = new Event;

        $event -> title = $data['title'];
        $event -> description = $data['description'];
        $event -> date = $data['date'] . ' ' . $data['time'];
        $event -> location = $data['location'];

        $event -> user() -> associate($user);

        $event -> save();

        $event -> tags() -> attach($data['tags']);

        return redirect() -> route('events.show', $event -> id);
    }

    public function show($id)
    {
        $event = Event :: find($id);

        return view('events.show', compact('event'));
    }

    public function edit($id)
    {
        $event = Event :: find($id);
        $tags = Tag :: all();

        return view('events.edit', compact('event', 'tags'));
    }

    public function update(Request $request, $id)
    {
        $data = $request -> all();
        // dd($data, $id);

        $event = Event :: find($id);

        $event -> title = $data['title'];
        $event -> description = $data['description'];
        $event -> date = $data['date'] . ' ' . $data['time'];
        $event -> location = $data['location'];

        $event -> save();

        $event -> tags() -> sync($data['tags']);

        return redirect() -> route('events.show', $event -> id);
    }

    public function destroy($id)
    {
        $event = Event :: find($id);

        $event -> tags() -> detach();

        $event -> delete();

        return redirect() -> route('events.index');
    }
}

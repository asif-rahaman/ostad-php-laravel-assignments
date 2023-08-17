<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        Event::create($request->all());
        return redirect()->route('events.index');
    }

    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $event->update($request->all());
        return redirect()->route('events.index');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index');
    }
    public function rsvp(Event $event)
    {
        auth()->user()->events()->attach($event);
        return redirect()->route('events.show', $event);
    }

    public function unrsvp(Event $event)
    {
        auth()->user()->events()->detach($event);
        return redirect()->route('events.show', $event);
    }
}

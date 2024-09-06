<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function index()
    {
        $events = Event::all();
        return view('events.list', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'description' =>
            'required', 'date' => 'required', 'location' => 'required', 'website' => 'required', 'topic' => 'required',]);
        Event::create($request->all());
        return redirect()->route('events.index')->with('success', 'Your event
added successfully!');

    }

    public function show($id)
    {
        $event = Event::find($id);
        return view('events.show', compact('event'));
    }

    public function edit($id)
    {
        $event = Event::find($id);
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'date' => 'required',
            'location' => 'required',
            'website' => 'required',
            ]);
        Event::find($id)->update($request->all());
        return redirect()->route('events.index')->with('success', 'Event updated
successfully');

    }

    public function destroy($id)
    {

            Event::find($id)->delete();
            return redirect()->route('events.index')->with('success', 'Event
removed successfully');
        }

}

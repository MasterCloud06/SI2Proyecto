<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function welcome()
    {
        $events = Event::orderBy('event_date', 'asc')->get();
        return view('welcome', compact('events'));
    }

    public function index()
    {
        $events = Event::orderBy('event_date', 'asc')->get();
        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date' => 'required|date|after_or_equal:today',
            'location' => 'nullable|string|max:255',
            'capacity' => 'nullable|integer|min:1',
            'category' => 'required|string',
            'price' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/events', $filename);
            $validatedData['image_path'] = 'events/' . $filename;
        }

        Event::create($validatedData);
        return redirect()->route('events.index')->with('success', 'Evento creado con éxito.');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date' => 'required|date|after_or_equal:today',
            'location' => 'nullable|string|max:255',
            'capacity' => 'nullable|integer|min:1',
            'category' => 'required|string',
            'price' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $event = Event::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($event->image_path && Storage::exists('public/' . $event->image_path)) {
                Storage::delete('public/' . $event->image_path);
            }
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/events', $filename);
            $validatedData['image_path'] = 'events/' . $filename;
        }

        $event->update($validatedData);
        return redirect()->route('events.index')->with('success', 'Evento actualizado con éxito.');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Evento eliminado con éxito.');
    }
}

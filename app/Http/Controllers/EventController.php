<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        // Obtener todos los eventos ordenados por fecha de evento
        $events = Event::orderBy('event_date', 'asc')->get();
        return view('events.index', compact('events')); // Cambiado a 'events.index'
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date' => 'required|date'
        ]);

        // Crear un nuevo evento
        Event::create($validatedData);

        return redirect()->route('events.index')->with('success', 'Evento creado con éxito.');
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
        // Validación de los datos del formulario
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date' => 'required|date'
        ]);

        // Actualizar el evento existente
        $event->update($validatedData);

        return redirect()->route('events.index')->with('success', 'Evento actualizado con éxito.');
    }

    public function destroy(Event $event)
    {
        // Eliminar el evento
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Evento eliminado con éxito.');
    }

    // Nuevo método para pasar los eventos a la página about
    public function about()
    {
        // Obtener todos los eventos
        $events = Event::all();

        // Pasar los eventos a la vista about
        return view('about', compact('events'));
    }
    public function home()
    {
        // Obtener todos los eventos
        $events = Event::all();

        // Pasar los eventos a la vista home
        return view('home', compact('events'));
    }
}

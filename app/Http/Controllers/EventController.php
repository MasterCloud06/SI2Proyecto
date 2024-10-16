<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Mostrar la página de bienvenida con todos los eventos.
     */
    public function welcome()
    {
        // Obtener todos los eventos ordenados por fecha ascendente
        $events = Event::orderBy('event_date', 'asc')->get();

        // Retornar la vista desde 'resources/views/welcome.blade.php'
        return view('welcome', compact('events'));
    }

    /**
     * Mostrar la página principal para el usuario autenticado con sus eventos.
     */
    public function home()
    {
        // Obtener todos los eventos disponibles
        $events = Event::orderBy('event_date', 'asc')->get();

        return view('home', compact('events'));
    }

    /**
     * Listar todos los eventos en el índice de eventos.
     */
    public function index()
    {
        $events = Event::orderBy('event_date', 'asc')->get();

        return view('events.index', compact('events'));
    }

    /**
     * Mostrar el formulario para crear un nuevo evento.
     */
    public function create()
    {
        return view('events.create');
    }

    public function edit($id)
    {
        // Buscar el evento por su ID
        $event = Event::findOrFail($id);

        // Retornar la vista de edición con los datos del evento
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        // Validación del formulario
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date' => 'required|date',
        ]);

        // Buscar el evento y actualizarlo
        $event = Event::findOrFail($id);
        $event->update($validatedData);

        // Redirigir al índice de eventos con un mensaje de éxito
        return redirect()->route('events.index')->with('success', 'Evento actualizado con éxito.');
    }



    /**
     * Almacenar un evento recién creado en la base de datos.
     */
    public function store(Request $request)
    {
        // Validación del formulario
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date' => 'required|date',
        ]);

        // Crear un nuevo evento en la base de datos
        Event::create($validatedData);

        return redirect()->route('events.index')->with('success', 'Evento creado con éxito.');
    }
}

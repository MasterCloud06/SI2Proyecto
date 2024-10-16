<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


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
            'event_date' => 'required|date|after_or_equal:today',
            'location' => 'nullable|string|max:255',
            'capacity' => 'nullable|integer|min:1',
            'category' => 'required|string',
            'price' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Buscar el evento
        $event = Event::findOrFail($id);

        // Verificar y manejar la carga de una nueva imagen
        if ($request->hasFile('image')) {
            // Eliminar la imagen anterior si existe
            if ($event->image_path && Storage::exists('public/' . $event->image_path)) {
                Storage::delete('public/' . $event->image_path);
            }

            // Guardar la nueva imagen
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/events', $filename);

            // Actualizar el campo image_path con la nueva ruta
            $validatedData['image_path'] = 'events/' . $filename;
        }

        // Actualizar el evento
        $event->update($validatedData);

        // Redirigir al índice con un mensaje de éxito
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
            'event_date' => 'required|date|after_or_equal:today',
            'location' => 'nullable|string|max:255',
            'capacity' => 'nullable|integer|min:1',
            'category' => 'required|string',
            'price' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Manejar la carga de imagen
        if ($request->hasFile('image')) {
            // Generar el nombre del archivo
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();

            // Usar explícitamente el disco 'public' para almacenar
            $request->file('image')->storeAs('events', $filename, 'public');

            // Guardar la ruta en la base de datos
            $validatedData['image_path'] = 'events/' . $filename;
        }




        // Crear un nuevo evento en la base de datos
        Event::create($validatedData);

        // Redirigir con mensaje de éxito
        return redirect()->route('events.index')->with('success', 'Evento creado con éxito.');
    }
    public function destroy($id)
    {
        // Buscar y eliminar el evento
        $event = Event::findOrFail($id);
        $event->delete();

        // Redirigir al índice con mensaje de éxito
        return redirect()->route('events.index')->with('success', 'Evento eliminado con éxito.');
    }


}

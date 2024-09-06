<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speaker;
use App\Models\Event;

class SpeakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Selectează toți speakerii, îi ordonează după nume în ordine crescătoare și îi paginează (afișează 5 pe pagină)
        $speakers = Speaker::orderBy('first_name', 'ASC')->paginate(5);

        // Calculează valoarea pentru paginare în funcție de pagina curentă și numărul de înregistrări pe pagină
        $value = ($request->input('page', 1) - 1) * 5;

        // Returnează view-ul 'speakers.list' împreună cu speakerii și valoarea pentru paginare
        return view('speakers.list', compact('speakers'))->with('i', $value);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('speakers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validează datele primite din formular
        $this->validate($request, ['first_name' => 'required', 'last_name' => 'required', 'email' => 'required', 'phone_number' => 'required', 'domain' => 'required', 'id_event' => 'nullable|exists:events,id' ]);

        // Creează un nou speaker utilizând datele primite și îl salvează în baza de date
        $speaker = new Speaker($request->all());
        if ($request->has('id_event')) {
            $event = Event::find($request->input('id_event'));
            $event->speakers()->save($speaker);
        }

        return redirect()->route('speakers.index')->with('success', 'Your speaker added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Găsește și returnează speakerul cu id-ul specificat
        $speaker = Speaker::find($id);

        // Returnează view-ul pentru afișarea detaliilor speakerului
        return view('speakers.show', compact('speaker'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Găsește și returnează speakerul cu id-ul specificat pentru a fi editat
        //$speaker = Speaker::find($id);

        // Returnează view-ul pentru editarea speakerului
        //return view('speakers.edit', compact('speaker'));
        $speaker = Speaker::findOrFail($id);
        $events = Event::all();

        return view('speakers.edit', compact('speaker', 'events'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validează datele primite din formular
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'domain' => 'required',
        ]);

        // Găsește speakerul cu id-ul specificat și îl actualizează cu datele primite
        Speaker::find($id)->update($request->all());

        // Redirecționează către pagina de indexare și afișează un mesaj de succes
        return redirect()->route('speakers.index')->with('success', 'Speaker updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Găsește și șterge speakerul cu id-ul specificat
        Speaker::find($id)->delete();

        // Redirecționează către pagina de indexare și afișează un mesaj de succes
        return redirect()->route('speakers.index')->with('success', 'Speaker removed successfully');
    }
}


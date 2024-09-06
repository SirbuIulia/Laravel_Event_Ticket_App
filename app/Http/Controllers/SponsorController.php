<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sponsor;
use App\Models\Event;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Selectează toți speakerii, îi ordonează după nume în ordine crescătoare și îi paginează (afișează 5 pe pagină)
        $sponsors = Sponsor::orderBy('name', 'ASC')->paginate(3);

        // Calculează valoarea pentru paginare în funcție de pagina curentă și numărul de înregistrări pe pagină
        $value = ($request->input('page', 1) - 1) * 3;
        // Returnează view-ul 'speakers.list' împreună cu speakerii și valoarea pentru paginare
        return view('sponsors.list', compact('sponsors'))->with('i', $value);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Returnează view-ul pentru crearea unui nou speaker
        return view('sponsors.create');
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
        $this->validate($request, ['name' => 'required', 'email' => 'required', 'id_event' => 'nullable|exists:events,id']);

        // Creează un nou speaker utilizând datele primite și îl salvează în baza de date
        $sponsor = Sponsor::create($request->all());
        if ($request->has('id_event')) {
            $event = Event::find($request->input('id_event'));
            $event->sponsors()->save($sponsor);
        }

        // Redirecționează către pagina de indexare și afișează un mesaj de succes
        return redirect()->route('sponsors.index')->with('success', 'Your sponsor added successfully!');
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
        $sponsor = Sponsor::find($id);

        // Returnează view-ul pentru afișarea detaliilor speakerului
        return view('sponsors.show', compact('sponsor'));
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
        $sponsor = Sponsor::find($id);

        // Returnează view-ul pentru editarea speakerului
        return view('sponsors.edit', compact('sponsor'));
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
            'name' => 'required',
            'email' => 'required'
        ]);

        // Găsește speakerul cu id-ul specificat și îl actualizează cu datele primite
        Sponsor::find($id)->update($request->all());

        // Redirecționează către pagina de indexare și afișează un mesaj de succes
        return redirect()->route('sponsors.index')->with('success', 'Sponsor updated successfully');
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
        Sponsor::find($id)->delete();

        // Redirecționează către pagina de indexare și afișează un mesaj de succes
        return redirect()->route('sponsors.index')->with('success', 'Sponsor removed successfully');
    }
}

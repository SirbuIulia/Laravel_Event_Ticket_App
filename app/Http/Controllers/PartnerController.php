<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\Event;


class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Selectează toți partenerii, îi ordonează după nume în ordine crescătoare și îi paginează (afișează 5 pe pagină)
        $partners = Partner::orderBy('name', 'ASC')->paginate(5);

        // Calculează valoarea pentru paginare în funcție de pagina curentă și numărul de înregistrări pe pagină
        $value = ($request->input('page', 1) - 1) * 5;

        // Returnează view-ul 'partners.list' împreună cu partenerii și valoarea pentru paginare
        return view('partners.list', compact('partners'))->with('i', $value);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Returnează view-ul pentru crearea unui nou partener
        return view('partners.create');
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
        $this->validate($request, ['name' => 'required', 'address' => 'required', 'partner_type' => 'required', 'id_event' => 'nullable|exists:events,id']);

        // Creează un nou partener utilizând datele primite și îl salvează în baza de date
        $partner = Partner::create($request->all());

        if ($request->has('id_event')) {
            $event = Event::find($request->input('id_event'));
            $event->partners()->save($partner);
        }
        // Redirecționează către pagina de indexare și afișează un mesaj de succes
        return redirect()->route('partners.index')->with('success', 'Your partner added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Găsește și returnează partenerul cu id-ul specificat
        $partner = Partner::find($id);

        // Returnează view-ul pentru afișarea detaliilor partenerului
        return view('partners.show', compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Găsește și returnează partenerul cu id-ul specificat pentru a fi editat
        $partner = Partner::find($id);

        // Returnează view-ul pentru editarea partenerului
        return view('partners.edit', compact('partner'));
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
            'address' => 'required',
            'partner_type' => 'required'
        ]);

        // Găsește partenerul cu id-ul specificat și îl actualizează cu datele primite
        Partner::find($id)->update($request->all());

        // Redirecționează către pagina de indexare și afișează un mesaj de succes
        return redirect()->route('partners.index')->with('success', 'Partner updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Găsește și șterge partenerul cu id-ul specificat
        Partner::find($id)->delete();

        // Redirecționează către pagina de indexare și afișează un mesaj de succes
        return redirect()->route('partners.index')->with('success', 'Partner removed successfully');
    }
}

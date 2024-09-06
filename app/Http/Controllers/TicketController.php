<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tickets = Ticket::all();

        // Returnează view-ul 'ticket' împreună cu biletele
        return view('ticket', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cart()
    {
        // Returnează view-ul pentru coșul de cumpărături
        return view('cart');
    }

    public function addToCart($code)
    {
        // Găsește biletul cu cod-ul specificat
        //$ticket = Ticket::find($code);
        $ticket = Ticket::where('code', $code)->first();


        // Verifică dacă biletul există
        if (!$ticket) {
            abort(404);
        }

        // Obține coșul din sesiune
        $cart = session()->get('cart');

        // Dacă coșul este gol, adaugă primul bilet
        if (!$cart) {
            $cart = [
                $code => [
                    "ticket_type" => $ticket->ticket_type,
                    "seat" => $ticket->seat,
                    "quantity" => 1,
                    "price" => $ticket->price
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Ticket added successfully in cart!');
        }

        // Dacă biletul există în coș, incrementăm cantitatea
        if (isset($cart[$code])) {
            $cart[$code]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Ticket added  successfully in cart!');
        }

        // Dacă biletul nu există în coș, îl adăugăm cu o cantitate de 1
        $cart[$code] = [
            "ticket_type" => $ticket->ticket_type,
            "seat" => $ticket->seat,
            "quantity" => 1,
            "price" => $ticket->price
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Ticket added  successfully in cart!');
    }


    public function create()
    {
        // Metoda pentru crearea unui bilet
    }

    public function store(Request $request)
    {
        // Metoda pentru stocarea unui bilet
    }

    public function show($code)
    {
        // Metoda pentru afișarea detaliilor unui bilet
    }

    public function edit($code)
    {
        // Metoda pentru editarea unui bilet
    }

    public function update(Request $request)
    {
        // Metoda pentru actualizarea unui bilet în coș
        if ($request->code and $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->code]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart modified successfully!');
        }

    }

    public function remove(Request $request)
    {
        // Metoda pentru eliminarea unui bilet din coș
        if ($request->code) {
            $cart = session()->get('cart');
            if (isset($cart[$request->code])) {
                unset($cart[$request->code]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Ticket deleted successfully!');
        }


//return redirect()->back();

}

   // public function destroy($code)
   // {
        // Metoda pentru ștergerea unui bilet
  //  }
}

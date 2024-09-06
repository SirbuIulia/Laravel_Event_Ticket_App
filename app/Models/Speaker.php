<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    public $fillable =['id','last_name', 'first_name', 'phone_number', 'email', 'domain', 'id_event'];

    public function event()
    {
        return $this->belongsTo(Event::class, 'id_event');
    }


    public function create()
    {
        $events = Event::all();
        return view('speakers.create', compact('events'));
    }

}

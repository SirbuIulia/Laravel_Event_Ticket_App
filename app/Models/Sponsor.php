<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    public $fillable = ['id','name', 'phone_number','email', 'address', 'contract', 'allocated_amount', 'logo', 'description', 'id_event'];
    public function event()
    {
        return $this->belongsTo(Event::class, 'id_event');
    }
}

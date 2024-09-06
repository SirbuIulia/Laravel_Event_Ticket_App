<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    public $fillable = ['id','name', 'partner_type', 'address', 'contract', 'phone_number', 'logo', 'description', 'id_event'];
    public function event()
    {
        return $this->belongsTo(Event::class, 'id_event');
    }
}

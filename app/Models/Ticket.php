<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public $fillable = ['code','price', 'seat', 'ticket_type', 'discount', 'id_order'];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}

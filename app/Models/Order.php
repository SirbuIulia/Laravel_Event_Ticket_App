<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $fillable = ['id','date', 'quantity', 'total_sum', 'payment_details', 'payment_methods', 'order_state', 'id_user'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $fillable = ['id','name', 'date', 'time', 'location', 'description','website', 'topic'];

    public function speakers()
    {
        return $this->hasMany(Speaker::class, 'id_event');
    }


    public function partners()
    {
        return $this->hasMany(Partner::class, 'id_event', 'id');
    }
    public function sponsor()
    {
        return $this->belongsTo(Sponsor::class,  'id');
    }

}

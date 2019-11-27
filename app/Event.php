<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name', 'description',
        'is_public', 'is_cancelled',
        'attraction_id', 'reservation_id'
    ];

    /**
     * Return its attraction
     */
    public function attraction() {
        return $this->belongsTo('App\Attraction', 'attraction_id');
    }

    /** 
     * Return its reservation
     */
    public function reservation() {
        return $this->belongsTo('App\Reservation', 'reservation_id');
    }
}

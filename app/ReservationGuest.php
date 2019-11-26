<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservationGuest extends Model
{
    protected $fillable = ['full_name', 'document', 'reservation_id'];
}

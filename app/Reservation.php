<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reservation extends Model
{
    protected $fillable = ['from', 'to', 'place_id', 'reserved_to', 'reserved_by'];

    public function guests() {
        return $this->hasMany('App\ReservationGuest');
    }

    public function place() {
        return $this->belongsTo('App\Place', 'place_id');
    }

    public function reservedTo() {
        return $this->belongsTo('App\Associate', 'reserved_to');
    }

    public function reservedBy() {
        return $this->belongsTo('App\User', 'reserved_by');
    }

    /**
     * Check if place has reservations between timestamps
     * 
     * @param int $placeId The place id
     * @param string $from DateTime from
     * @param string $to DateTime to
     * @param int $reservationId (Optional) Reservatio id to ignore on check
     * 
     * @return bool True if place has 
     */
    public static function placeHasReservation(int $placeId, string $from, string $to, int $reservationId = null) {
        $query = DB::table('reservations')->where('place_id', '=', $placeId);

        // Ignore a reservation by its id, if informed
        if (!is_null($reservationId)) {
            $query->where('id', '<>', $reservationId);
        }

        $query->where(function ($query) use ($from, $to) {
            $query->whereBetween('from', [$from, $to])
                ->orWhereBetween('to', [$from, $to]);
        });

        return !empty($query->get()->all());
    }
}

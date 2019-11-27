<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventTicket extends Model
{
    protected $fillable = ['ticket_type_id', 'event_id'];

    /**
     * Returns its Event
     */
    public function event() {
        return $this->belongsTo('App\Event', 'event_id');
    }

    /**
     * Return its Ticket Type
     */
    public function type() {
        return $this->belongsTo('App\TicketType', 'ticket_type_id');
    }
}

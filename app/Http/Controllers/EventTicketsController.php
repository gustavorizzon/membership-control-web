<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\EventTicketRequest;
use App\EventTicket;
use Illuminate\Http\Request;

class EventTicketsController extends Controller
{
    /**
	 * Returns the index view of the EventTickets.
	 */
    public function index($id) {
		// Checking if the given id is a event id
		if (!Event::find($id)->is_public) {
			return redirect()->back();
		}

		// Return the event_tickets index for the event
		$event_tickets = EventTicket::where('event_id', $id)->get();
		return view('event_tickets.index', [
            'event_tickets' => $event_tickets,
            'event_id' => $id
        ]);
    }
    
    /**
	 * Returns the view with the form to register new event_tickets
	 */
	public function create($id) {
		return view('event_tickets.create', ['event_id' => $id]);
    }
    
    /**
	 * Create a new Reservation using request data
	 * 
	 * @param EventTicketRequest $request Request
	 */
	public function store(EventTicketRequest $request) {
        $requestData = $request->all();
        $event_id = $requestData['event_id'];

        for ($i = 0; $i < $requestData['amount']; $i++) {
            EventTicket::create($requestData);
        }

		return redirect()->route('event_tickets', ['id' => $event_id]);
    }
    
    /**
	 * Destroy a EventTicket by given id
	 * 
	 * @param mixed $id The event_ticket id
	 */
	public function destroy($id) {
		try {
			EventTicket::find($id)->delete();
			return ['status' => 'success'];
		} catch (\Illuminate\Database\QueryException $qe) {
			return ['status' => 'error', 'message' => $qe->getMessage()];
		} catch (\PDOException $e) {
			return ['status' => 'error', 'message' => $qe->getMessage()];
		}
	}
}
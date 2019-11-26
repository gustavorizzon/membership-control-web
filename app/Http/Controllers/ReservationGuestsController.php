<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationGuestRequest;
use App\ReservationGuest;
use Illuminate\Http\Request;

class ReservationGuestsController extends Controller
{
    /**
	 * Returns the index view of the Reservation Guests.
	 */
    public function index($id) {
		$reservation_guests = ReservationGuest::where('reservation_id', $id)->orderBy('full_name')->get();
		return view('reservation_guests.index', [
            'reservation_guests' => $reservation_guests,
            'reservation_id' => $id
        ]);
    }
    
    /**
	 * Returns the view with the form to register new reservation guests
	 */
	public function create($id) {
		return view('reservation_guests.create', ['reservation_id' => $id]);
    }
    
    /**
	 * Create a new Reservation using request data
	 * 
	 * @param ReservationGuestRequest $request Request
	 */
	public function store(ReservationGuestRequest $request) {
        $reservation_guest = ReservationGuest::create($request->all());

		return redirect()->route('reservation_guests', [
            'id' => $reservation_guest->reservation_id
        ]);
    }
    
    /**
	 * Destroy a Reservation Guest by given id
	 * 
	 * @param mixed $id The reservation guest id
	 */
	public function destroy($id) {
		try {
			ReservationGuest::find($id)->delete();
			return ['status' => 'success'];
		} catch (\Illuminate\Database\QueryException $qe) {
			return ['status' => 'error', 'message' => $qe->getMessage()];
		} catch (\PDOException $e) {
			return ['status' => 'error', 'message' => $qe->getMessage()];
		}
	}

	/**
	 * Returns the view with the form to edit an reservation guests
	 * 
	 * @param mixed $id The reservation guest id
	 */
	public function edit($id) {
		$reservation_guest = ReservationGuest::find($id);
		return view('reservation_guests.edit', compact('reservation_guest'));
	}

	/**
	 * Updates the Reservation Guest and redirects to index route
	 * 
	 * @param ReservationGuestRequest $request Request
	 * @param mixed $id The reservation guest id
	 */
	public function update(ReservationGuestRequest $request, $id) {
		$requestData = $request->all();

		ReservationGuest::find($id)->update($requestData);
		
		return redirect()->route('reservation_guests', [
            'id' => $requestData['reservation_id']
        ]);
    }
}

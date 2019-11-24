<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\Http\Requests\ReservationRequest;
use Illuminate\Support\Facades\Auth;

class ReservationsController extends Controller
{
	/**
	 * Returns the index view of the Reservations.
	 */
    public function index() {
		$reservations = Reservation::orderBy('from')->paginate(10);
		return view('reservations.index', ['reservations' => $reservations]);
	}

	/**
	 * Returns the view with the form to register new reservations
	 */
	public function create() {
		return view('reservations.create');
	}

	/**
	 * Create a new Reservation using request data
	 * 
	 * @param ReservationRequest $request Request
	 */
	public function store(ReservationRequest $request) {
        $requestData = $request->all();

        // Getting timestamps
        $from = date('Y-m-d H:i:s', strtotime($requestData['from']));
		$to   = date('Y-m-d H:i:s', strtotime($requestData['to']));
		
		// Checking reservations on this place between timestamps
		if (Reservation::placeHasReservation($requestData['place_id'], $from, $to)) {
			return redirect()->back()->withErrors(['place_id' => __('This place already has reservations between these moments.')]);
		}

		// Defining who is making the reservation
		$requestData['reserved_by'] = Auth::id();

		Reservation::create($requestData);

		return redirect()->route('reservations');
	}

	/**
	 * Destroy a Reservation by given id
	 * 
	 * @param mixed $id The reservation id
	 */
	public function destroy($id) {
		try {
			Reservation::find($id)->delete();
			return ['status' => 'success'];
		} catch (\Illuminate\Database\QueryException $qe) {
			return ['status' => 'error', 'message' => $qe->getMessage()];
		} catch (\PDOException $e) {
			return ['status' => 'error', 'message' => $qe->getMessage()];
		}
	}

	/**
	 * Returns the view with the form to edit an reservations
	 * 
	 * @param mixed $id The reservation id
	 */
	public function edit($id) {
		$reservation = Reservation::find($id);
		return view('reservations.edit', compact('reservation'));
	}

	/**
	 * Updates the Reservation and redirects to index route
	 * 
	 * @param ReservationRequest $request Request
	 * @param mixed $id The reservation id
	 */
	public function update(ReservationRequest $request, $id) {
		$requestData = $request->all();

		// Getting timestamps
        $from = date('Y-m-d H:i:s', strtotime($requestData['from']));
		$to   = date('Y-m-d H:i:s', strtotime($requestData['to']));

		// Checking reservations on this place between timestamps
		if (Reservation::placeHasReservation($requestData['place_id'], $from, $to, $id)) {
			return redirect()->back()->withErrors(['place_id' => __('This place already has reservations between these moments.')]);
		}

		$reservation = Reservation::find($id)->update($requestData);
		
		return redirect()->route('reservations');
    }
}

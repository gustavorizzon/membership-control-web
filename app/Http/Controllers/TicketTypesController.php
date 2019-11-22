<?php

namespace App\Http\Controllers;

use App\TicketType;
use App\Http\Requests\TicketTypeRequest;

class TicketTypesController extends Controller
{
	/**
	 * Returns the index view of the TicketTypes.
	 */
    public function index() {
		$ticket_types = TicketType::orderBy('name')->paginate(10);
		return view('ticket_types.index', ['ticket_types' => $ticket_types]);
	}

	/**
	 * Returns the view with the form to register new ticket_types
	 */
	public function create() {
		return view('ticket_types.create');
	}

	/**
	 * Create a new TicketType using request data
	 * 
	 * @param TicketTypeRequest $request Request
	 */
	public function store(TicketTypeRequest $request) {
		$ticket_type = $request->all();
		TicketType::create($ticket_type);

		return redirect()->route('ticket_types');
	}

	/**
	 * Destroy a TicketType by given id
	 * 
	 * @param mixed $id The ticket_type id
	 */
	public function destroy($id) {
		try {
			TicketType::find($id)->delete();
			return ['status' => 'success'];
		} catch (\Illuminate\Database\QueryException $qe) {
			return ['status' => 'error', 'message' => $qe->getMessage()];
		} catch (\PDOException $e) {
			return ['status' => 'error', 'message' => $qe->getMessage()];
		}
	}

	/**
	 * Returns the view with the form to edit an ticket_types
	 * 
	 * @param mixed $id The ticket_type id
	 */
	public function edit($id) {
		$ticket_type = TicketType::find($id);
		return view('ticket_types.edit', compact('ticket_type'));
	}

	/**
	 * Updates the TicketType and redirects to index route
	 * 
	 * @param TicketTypeRequest $request Request
	 * @param mixed $id The ticket_type id
	 */
	public function update(TicketTypeRequest $request, $id) {
		$ticket_type = TicketType::find($id)->update($request->all());
		return redirect()->route('ticket_types');
	}
}

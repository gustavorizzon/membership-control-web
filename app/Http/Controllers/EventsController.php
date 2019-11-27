<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\EventRequest;

class EventsController extends Controller
{
	/**
	 * Returns the index view of the Events.
	 */
    public function index() {
		$events = Event::orderBy('name')->paginate(10);
		return view('events.index', ['events' => $events]);
	}

	/**
	 * Returns the view with the form to register new events
	 */
	public function create() {
		return view('events.create');
	}

	/**
	 * Create a new Event using request data
	 * 
	 * @param EventRequest $request Request
	 */
	public function store(EventRequest $request) {
		$event = $request->all();
		Event::create($event);

		return redirect()->route('events');
	}

	/**
	 * Destroy a Event by given id
	 * 
	 * @param mixed $id The event id
	 */
	public function destroy($id) {
		try {
			Event::find($id)->delete();
			return ['status' => 'success'];
		} catch (\Illuminate\Database\QueryException $qe) {
			return ['status' => 'error', 'message' => $qe->getMessage()];
		} catch (\PDOException $e) {
			return ['status' => 'error', 'message' => $qe->getMessage()];
		}
	}

	/**
	 * Returns the view with the form to edit an events
	 * 
	 * @param mixed $id The event id
	 */
	public function edit($id) {
		$event = Event::find($id);
		return view('events.edit', compact('event'));
	}

	/**
	 * Updates the Event and redirects to index route
	 * 
	 * @param EventRequest $request Request
	 * @param mixed $id The event id
	 */
	public function update(EventRequest $request, $id) {
		$event = Event::find($id)->update($request->all());
		return redirect()->route('events');
	}
}

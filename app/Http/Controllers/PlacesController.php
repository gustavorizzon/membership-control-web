<?php

namespace App\Http\Controllers;

use App\Place;
use App\Http\Requests\PlaceRequest;

class PlacesController extends Controller
{
	/**
	 * Returns the index view of the Places.
	 */
    public function index() {
		$places = Place::orderBy('name')->paginate(10);
		return view('places.index', ['places' => $places]);
	}

	/**
	 * Returns the view with the form to register new places
	 */
	public function create() {
		return view('places.create');
	}

	/**
	 * Create a new Place using request data
	 * 
	 * @param PlaceRequest $request Request
	 */
	public function store(PlaceRequest $request) {
		$place = $request->all();
		Place::create($place);

		return redirect()->route('places');
	}

	/**
	 * Destroy a Place by given id
	 * 
	 * @param mixed $id The place id
	 */
	public function destroy($id) {
		try {
			Place::find($id)->delete();
			return ['status' => 'success'];
		} catch (\Illuminate\Database\QueryException $qe) {
			return ['status' => 'error', 'message' => $qe->getMessage()];
		} catch (\PDOException $e) {
			return ['status' => 'error', 'message' => $qe->getMessage()];
		}
	}

	/**
	 * Returns the view with the form to edit an places
	 * 
	 * @param mixed $id The place id
	 */
	public function edit($id) {
		$place = Place::find($id);
		return view('places.edit', compact('place'));
	}

	/**
	 * Updates the Place and redirects to index route
	 * 
	 * @param PlaceRequest $request Request
	 * @param mixed $id The place id
	 */
	public function update(PlaceRequest $request, $id) {
		$place = Place::find($id)->update($request->all());
		return redirect()->route('places');
	}
}

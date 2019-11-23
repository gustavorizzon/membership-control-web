<?php

namespace App\Http\Controllers;

use App\PlaceType;
use App\Http\Requests\PlaceTypeRequest;

class PlaceTypesController extends Controller
{
	/**
	 * Returns the index view of the PlaceTypes.
	 */
    public function index() {
		$place_types = PlaceType::orderBy('name')->paginate(10);
		return view('place_types.index', ['place_types' => $place_types]);
	}

	/**
	 * Returns the view with the form to register new place_types
	 */
	public function create() {
		return view('place_types.create');
	}

	/**
	 * Create a new PlaceType using request data
	 * 
	 * @param PlaceTypeRequest $request Request
	 */
	public function store(PlaceTypeRequest $request) {
		$place_type = $request->all();
		PlaceType::create($place_type);

		return redirect()->route('place_types');
	}

	/**
	 * Destroy a PlaceType by given id
	 * 
	 * @param mixed $id The place_type id
	 */
	public function destroy($id) {
		try {
			PlaceType::find($id)->delete();
			return ['status' => 'success'];
		} catch (\Illuminate\Database\QueryException $qe) {
			return ['status' => 'error', 'message' => $qe->getMessage()];
		} catch (\PDOException $e) {
			return ['status' => 'error', 'message' => $qe->getMessage()];
		}
	}

	/**
	 * Returns the view with the form to edit an place_types
	 * 
	 * @param mixed $id The place_type id
	 */
	public function edit($id) {
		$place_type = PlaceType::find($id);
		return view('place_types.edit', compact('place_type'));
	}

	/**
	 * Updates the PlaceType and redirects to index route
	 * 
	 * @param PlaceTypeRequest $request Request
	 * @param mixed $id The place_type id
	 */
	public function update(PlaceTypeRequest $request, $id) {
		$place_type = PlaceType::find($id)->update($request->all());
		return redirect()->route('place_types');
	}
}

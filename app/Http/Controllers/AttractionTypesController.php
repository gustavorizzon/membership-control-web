<?php

namespace App\Http\Controllers;

use App\AttractionType;
use App\Http\Requests\AttractionTypeRequest;

class AttractionTypesController extends Controller
{
	/**
	 * Returns the index view of the AttractionTypes.
	 */
    public function index() {
		$attraction_types = AttractionType::orderBy('name')->paginate(10);
		return view('attraction_types.index', ['attraction_types' => $attraction_types]);
	}

	/**
	 * Returns the view with the form to register new attraction_types
	 */
	public function create() {
		return view('attraction_types.create');
	}

	/**
	 * Create a new AttractionType using request data
	 * 
	 * @param AttractionTypeRequest $request Request
	 */
	public function store(AttractionTypeRequest $request) {
		$attraction_type = $request->all();
		AttractionType::create($attraction_type);

		return redirect()->route('attraction_types');
	}

	/**
	 * Destroy a AttractionType by given id
	 * 
	 * @param mixed $id The attraction_type id
	 */
	public function destroy($id) {
		try {
			AttractionType::find($id)->delete();
			return ['status' => 'success'];
		} catch (\Illuminate\Database\QueryException $qe) {
			return ['status' => 'error', 'message' => $qe->getMessage()];
		} catch (\PDOException $e) {
			return ['status' => 'error', 'message' => $qe->getMessage()];
		}
	}

	/**
	 * Returns the view with the form to edit an attraction_types
	 * 
	 * @param mixed $id The attraction_type id
	 */
	public function edit($id) {
		$attraction_type = AttractionType::find($id);
		return view('attraction_types.edit', compact('attraction_type'));
	}

	/**
	 * Updates the AttractionType and redirects to index route
	 * 
	 * @param AttractionTypeRequest $request Request
	 * @param mixed $id The attraction_type id
	 */
	public function update(AttractionTypeRequest $request, $id) {
		$attraction_type = AttractionType::find($id)->update($request->all());
		return redirect()->route('attraction_types');
	}
}

<?php

namespace App\Http\Controllers;

use App\Attraction;
use App\Http\Requests\AttractionRequest;

class AttractionsController extends Controller
{
	/**
	 * Returns the index view of the Attractions.
	 */
    public function index() {
		$attractions = Attraction::orderBy('name')->paginate(10);
		return view('attractions.index', ['attractions' => $attractions]);
	}

	/**
	 * Returns the view with the form to register new attractions
	 */
	public function create() {
		return view('attractions.create');
	}

	/**
	 * Create a new Attraction using request data
	 * 
	 * @param AttractionRequest $request Request
	 */
	public function store(AttractionRequest $request) {
		$attraction = $request->all();
		Attraction::create($attraction);

		return redirect()->route('attractions');
	}

	/**
	 * Destroy a Attraction by given id
	 * 
	 * @param mixed $id The attraction id
	 */
	public function destroy($id) {
		try {
			Attraction::find($id)->delete();
			return ['status' => 'success'];
		} catch (\Illuminate\Database\QueryException $qe) {
			return ['status' => 'error', 'message' => $qe->getMessage()];
		} catch (\PDOException $e) {
			return ['status' => 'error', 'message' => $qe->getMessage()];
		}
	}

	/**
	 * Returns the view with the form to edit an attractions
	 * 
	 * @param mixed $id The attraction id
	 */
	public function edit($id) {
		$attraction = Attraction::find($id);
		return view('attractions.edit', compact('attraction'));
	}

	/**
	 * Updates the Attraction and redirects to index route
	 * 
	 * @param AttractionRequest $request Request
	 * @param mixed $id The attraction id
	 */
	public function update(AttractionRequest $request, $id) {
		$attraction = Attraction::find($id)->update($request->all());
		return redirect()->route('attractions');
	}
}

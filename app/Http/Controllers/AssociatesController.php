<?php

namespace App\Http\Controllers;

use App\Associate;
use App\Http\Requests\AssociateRequest;

class AssociatesController extends Controller
{
	/**
	 * Returns the index view of the Associates.
	 */
    public function index() {
		$associates = Associate::orderBy('name')->paginate(10);
		return view('associates.index', ['associates' => $associates]);
	}

	/**
	 * Returns the view with the form to register new associates
	 */
	public function create() {
		return view('associates.create');
	}

	/**
	 * Create a new Associate using request data
	 * 
	 * @param AssociateRequest $request Request
	 */
	public function store(AssociateRequest $request) {
		$associate = $request->all();
		Associate::create($associate);

		return redirect()->route('associates');
	}

	/**
	 * Destroy a Associate by given id
	 * 
	 * @param mixed $id The associate id
	 */
	public function destroy($id) {
		try {
			Associate::find($id)->delete();
			return ['status' => 'success'];
		} catch (\Illuminate\Database\QueryException $qe) {
			return ['status' => 'error', 'message' => $qe->getMessage()];
		} catch (\PDOException $e) {
			return ['status' => 'error', 'message' => $qe->getMessage()];
		}
	}

	/**
	 * Returns the view with the form to edit an associates
	 * 
	 * @param mixed $id The associate id
	 */
	public function edit($id) {
		$associate = Associate::find($id);
		return view('associates.edit', compact('associate'));
	}

	/**
	 * Updates the Associate and redirects to index route
	 * 
	 * @param AssociateRequest $request Request
	 * @param mixed $id The associate id
	 */
	public function update(AssociateRequest $request, $id) {
		$associate = Associate::find($id)->update($request->all());
		return redirect()->route('associates');
	}
}

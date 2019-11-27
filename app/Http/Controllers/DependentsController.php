<?php

namespace App\Http\Controllers;

use App\Associate;
use App\Http\Requests\DependentRequest;
use App\Dependent;
use Illuminate\Http\Request;

class DependentsController extends Controller
{
    /**
	 * Returns the index view of the Dependents.
	 */
    public function index($id) {
		// Checking if the given id is a holder id
		if (!Associate::find($id)->is_holder) {
			return redirect()->back();
		}

		// Return the dependents index for the holder
		$dependents = Dependent::where('holder_id', $id)->get();
		return view('dependents.index', [
            'dependents' => $dependents,
            'holder_id' => $id
        ]);
    }
    
    /**
	 * Returns the view with the form to register new dependents
	 */
	public function create($id) {
		return view('dependents.create', ['holder_id' => $id]);
    }
    
    /**
	 * Create a new Reservation using request data
	 * 
	 * @param DependentRequest $request Request
	 */
	public function store(DependentRequest $request) {
        $dependent = Dependent::create($request->all());

		return redirect()->route('dependents', [
            'id' => $dependent->holder_id
        ]);
    }
    
    /**
	 * Destroy a Dependent by given id
	 * 
	 * @param mixed $id The dependent id
	 */
	public function destroy($id) {
		try {
			Dependent::find($id)->delete();
			return ['status' => 'success'];
		} catch (\Illuminate\Database\QueryException $qe) {
			return ['status' => 'error', 'message' => $qe->getMessage()];
		} catch (\PDOException $e) {
			return ['status' => 'error', 'message' => $qe->getMessage()];
		}
	}
}
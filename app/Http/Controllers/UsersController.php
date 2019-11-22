<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
	/**
	 * Returns the index view of the Users.
	 */
    public function index() {
		$users = User::orderBy('name')->paginate(10);
		return view('users.index', ['users' => $users]);
	}

	/**
	 * Returns the view with the form to register new users
	 */
	public function create() {
		return view('users.create');
	}

	/**
	 * Create a new User using request data
	 * 
	 * @param UserRequest $request Request
	 */
	public function store(UserRequest $request) {
		$user = $request->all();
		$user['password'] = bcrypt($user['password']);
		User::create($user);

		return redirect()->route('users');
	}

	/**
	 * Destroy a User by given id
	 * 
	 * @param mixed $id The user id
	 */
	public function destroy($id) {
		try {
			User::find($id)->delete();
			return ['status' => 'success'];
		} catch (\Illuminate\Database\QueryException $qe) {
			return ['status' => 'error', 'message' => $qe->getMessage()];
		} catch (\PDOException $e) {
			return ['status' => 'error', 'message' => $qe->getMessage()];
		}
	}

	/**
	 * Returns the view with the form to edit an users
	 * 
	 * @param mixed $id The user id
	 */
	public function edit($id) {
		$user = User::find($id);
		return view('users.edit', compact('user'));
	}

	/**
	 * Updates the User and redirects to index route
	 * 
	 * @param UserRequest $request Request
	 * @param mixed $id The user id
	 */
	public function update(UserRequest $request, $id) {
		$data = $request->all();

		// Dont update password if left blank on editing
		if (empty($data['password'])) {
			unset($data['password']);
		} else {
			$data['password'] = bcrypt($data['password']);
		}

		// Update user by id with request data
		$user = User::find($id)->update($data);

		return redirect()->route('users');
	}
}

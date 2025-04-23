<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user. (Not used in this case)
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created user in storage. (Not used in this case)
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified user. (Not used in this case)
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified user's role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user's role in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'role' => $request->role
        ]);

        return redirect()->route('users.index')->with('success', 'Role updated!');
    }

    /**
     * Remove the specified user from storage. (Optional)
     */
    public function destroy($id)
    {
        //
    }
}

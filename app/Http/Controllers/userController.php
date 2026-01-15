<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userCreate;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = userCreate::orderby('sys_name', 'ASC')->paginate(10);
        return view('users', ['userList' => $users]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->validate([
            'sys_username' => 'required',
            'sys_name' => 'required',
            'sys_dept' => 'required',
            'sys_password' => 'required',
            'sys_role' => 'required'

        ]);

        userCreate::create($user);

        return redirect()->route('users');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

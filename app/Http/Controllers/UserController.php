<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }
    public function create()
    {
        return view('users.create');
    }
    public function store(Request $request)
    {
        // Vidate and store the user data
        // Redirect or return a responseal
    }
    public function show($id)
    {
        // Fetch and display a single user
        return view('users.show', compact('id'));
    }
    public function edit($id)
    {
        // Fetch the user for editing
        return view('users.edit', compact('id'));
    }
    public function update(Request $request, $id)
    {
        // Validate and update the user data
        // Redirect or return a response
    }
    public function destroy($id)
    {
        // Delete the user
        // Redirect or return a response
    }
}

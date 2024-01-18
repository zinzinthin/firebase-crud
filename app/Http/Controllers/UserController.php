<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\FirebaseConnection;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        FirebaseConnection::connect()->getReference('users')->push($request->except(['_token']));
       return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $user = FirebaseConnection::connect()->getReference('users')->getChild($id)->getValue();
        return view('users.edit',compact('user','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        FirebaseConnection::connect()->getReference('users/'.$id)->update($request->except(['_token']));
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        FirebaseConnection::connect()->getReference('users/'.$id)->remove();
        return redirect()->route('users.index');
    }
}

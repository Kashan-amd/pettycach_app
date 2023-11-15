<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the current authenticated user
        $user = Auth::user();

        $data = Type::where('user_id', $user->id)->get();
        return view('type', compact('data'));
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
        $user = User::where('id', Auth::user()->id)->first()->id;
        //dd($user);
        $request->validate([
            'type' => 'required',
        ]);

        $data = Type::create([
            'type' => $request->type,
            'user_id' => $user
        ]);

        return redirect('/types')->with('status', 'Type added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $type)
    {
        $type = Type::find($type);
        $type->delete();

        return redirect('/types')->with('deleted', 'Type has been deleted');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\PettyCash;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PettyCashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $type = Type::where('user_id', $user->id)->get();
        return view('home', compact('type'));
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
            'date' => 'required',
            'description' => 'required| max:20',
            'amount' => 'required',
            'type' => 'required',
        ]);

        $data = PettyCash::create([
            'date' => $request->date,
            'description' => $request->description,
            'amount' => $request->amount,
            'type' => $request->type,
            'user_id' => $user
        ]);

        return redirect('/pettycash')->with('status', 'Transaction added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(PettyCash $pettyCash)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PettyCash $pettyCash)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PettyCash $pettyCash)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PettyCash $id)
    {
        //
    }
}

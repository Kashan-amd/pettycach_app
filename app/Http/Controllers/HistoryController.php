<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PettyCash;
use App\Models\Type;
use App\Exports\PettyCashExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Get the current authenticated user
        $user = Auth::user();

        $search = $request->input('search');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
    
        $query = PettyCash::query();
    
        if ($search) {
            $query->where('description', 'LIKE', "%$search%");
        }
    
        if ($startDate && $endDate) {
            $query->whereBetween('date', [$startDate, $endDate]);
        }

        $type = Type::where('user_id', $user->id)->get();
        $pettycash = $query->orderBy('created_at', 'desc')->where('user_id', $user->id)->get();
        //dd($type->first()->id);
        
        $pettycashByType = $pettycash->groupBy('type');

        $amountTotal = $pettycash->sum('amount');
        $typetotals = [];
        
        foreach ($type as $typeItem) {
            $typeId = $typeItem->id;
            
            if (isset($pettycashByType[$typeId])) {
                $typetotals[$typeId] = $pettycashByType[$typeId]->sum('amount');
            }
        }        
        $countType = Type::get()->count();
        return view('history',compact('type' ,'pettycash', 'amountTotal', 'typetotals'));
    }

    public function exportExcel(){
        return Excel::download(new PettyCashExport, 'pettycash.xlsx');
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
        //
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
        $transaction = PettyCash::find($id);
        $transaction->delete();

        return redirect('/history')->with('deleted', 'Record has been deleted');
    }
}

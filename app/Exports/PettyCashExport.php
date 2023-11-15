<?php

namespace App\Exports;

use App\Models\PettyCash;
use Maatwebsite\Excel\Concerns\FromCollection;

class PettyCashExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PettyCash::all();
    }
}

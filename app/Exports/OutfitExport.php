<?php

namespace App\Exports;

use App\Models\Outfit;
use Maatwebsite\Excel\Concerns\FromCollection;

class OutfitExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Outfit::all();
    }
}

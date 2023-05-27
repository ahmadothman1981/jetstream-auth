<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportUsers implements FromCollection, WithHeadings
{
    
    /**
    * @return \Illuminate\Support\Collection
    */

     public function collection()
    {
        return User::select('Name','Email','Phone')->get();
    }

    public function headings(): array
    {
        return [
            
            'Name',
            'Email',
            'Phone',
        ];
    }

    

   
}

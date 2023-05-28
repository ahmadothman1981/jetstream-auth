<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportUsers implements FromArray, WithHeadings
{
    
    

     public function array(): array
    {
        $userList=[];

        $users = User::all();
        foreach($users as $user)
        {
           $userList[] =[$user->name,$user->email,$user->phone]; 
        }

        return $userList; 
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

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function Arabic()
    {   
        session()->get('Language');
        session()->forget('Language');
        Session::put('Language','Arabic');

        return redirect()->back();
    }//End Method


    public function English()
    {   
        session()->get('Language');
        session()->forget('Language');
        Session::put('Language','English');

        return redirect()->back();
    }//End Method
}

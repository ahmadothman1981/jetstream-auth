<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function language($locale)
    {
        if(in_array($locale,['ar','en']))
    {
        session()->put('locale',$locale);
    }

    
    return redirect()->back();

    }//End Method
}

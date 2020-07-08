<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Landlord;
use Illuminate\Support\Facades\DB;
class InspectorController extends Controller
{
    
    public function debt() {
        $landlords = Landlord::where('debt', '!=', null)->get();
        return view('inspector.debt', compact( 'landlords'));
    }

    public function statistic() {
        $landlords = Landlord::where('debt', '!=', null)->get();
        $number = count($landlords);
        return view('inspector.statistic', compact( 'landlords', 'number'));
    }
}

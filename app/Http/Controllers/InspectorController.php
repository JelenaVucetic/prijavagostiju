<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InspectorController extends Controller
{
    public function index() {
        return view('inspector.index');
    }
}

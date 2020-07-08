<?php

namespace App\Http\Controllers;

use App\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::latest()->paginate(500);
        return view('admin.states.index', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:3|max:50',
        ],
        [
            'name.required' => 'Unesite vaše ime.',
            'name.min' => 'Vaše ime mora sadžati bar 3 karaktera',
            'name.max' => 'Vaše ime mora sadžati najviše 50 karaktera'
        ]);

        $state = new State([
            'name' => $request->get('name'),        
        ]);

        $state->save();
        return back()->with('message', 'Država je sačuvana!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
        $request->validate([
            'name'=>'required|min:3|max:50'
        ],
        [
            'name.required' => 'Unesite vaše ime.',
            'name.min' => 'Vaše ime mora sadžati bar 3 karaktera',
            'name.max' => 'Vaše ime mora sadžati najviše 50 karaktera'
        ]);
                  
         $state = State::find($state->id);
         $state->name =  $request->get('name');
         $state->save();
         return back()->with('message', 'Država je izmjenjena');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        $state = State::find($state->id);
        $state->delete();

        return back()->with('message', 'Država je uspješno sačuvana!');
    }
}

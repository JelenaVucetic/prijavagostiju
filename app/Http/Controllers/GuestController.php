<?php

namespace App\Http\Controllers;

use App\Guest;
use App\State;
use App\Landlord;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function __construct()
    {
        $this->middleware('informant');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::all();
        $guests = Guest::latest()->paginate(500);
     
        return view('informant.guests.index', compact('states', 'guests'));
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
            'firstname'=>'required|min:3|max:50',
            'lastname'=>'required|min:3|max:50',
            'gender'=>'required',
            'date_of_birth'=>'required',
            'travel_document'=>'required',
            'travel_document_number'=>'required',
            'expiration_date'=>'required',
            'state_id'=>'required'
        ],
        [
            'firstname.required' => 'Unesite vaše ime.',
            'firstname.min' => 'Vaše ime mora sadžati bar 3 karaktera',
            'firstname.max' => 'Vaše ime mora sadžati najviše 50 karaktera',
            'lastname.required' => 'Unesite vaše ime.',
            'lastname.min' => 'Vaše ime mora sadžati bar 3 karaktera',
            'lastname.max' => 'Vaše ime mora sadžati najviše 50 karaktera',
            'gender.required' => 'Odaberite pol.',
            'date_of_birth.required' => 'Unesite vaš datum rođenja.',
            'travel_document.required' => 'odaberite vrstu putne isprave.',
            'travel_document_number.required' => 'Unesite broj putne isprave.',
            'expiration_date.required' => 'Unesite datum važenja putne isprave.',
            'state_id.required' => 'Odaberite državljanstvo.'
        ]);

        $guest = new Guest([
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'gender' => $request->get('gender'),
            'date_of_birth' => $request->get('date_of_birth'),
            'travel_document' => $request->get('travel_document'),
            'travel_document_number' => $request->get('travel_document_number'),
            'expiration_date' => $request->get('expiration_date'),
            'state_id' => $request->get('state_id'),
        
        ]);

        $guest->save();
        return back()->with('messages', 'Gost je sačuvan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function show(Guest $guest)
    {
        $landlords = Landlord::all();
       return view('informant.guests.registration', compact('guest', 'landlords'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function edit(Guest $guest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guest $guest)
    {
        $request->validate([
            'firstname'=>'required|min:3|max:50',
            'lastname'=>'required|min:3|max:50',
            'gender'=>'required',
            'date_of_birth'=>'required',
            'travel_document'=>'required',
            'travel_document_number'=>'required',
            'expiration_date'=>'required',
            'state_id'=>'required'
        ],
        [
            'firstname.required' => 'Unesite vaše ime.',
            'firstname.min' => 'Vaše ime mora sadžati bar 3 karaktera',
            'firstname.max' => 'Vaše ime mora sadžati najviše 50 karaktera',
            'lastname.required' => 'Unesite vaše ime.',
            'lastname.min' => 'Vaše ime mora sadžati bar 3 karaktera',
            'lastname.max' => 'Vaše ime mora sadžati najviše 50 karaktera',
            'gender.required' => 'Odaberite pol.',
            'date_of_birth.required' => 'Unesite vaš datum rođenja.',
            'travel_document.required' => 'odaberite vrstu putne isprave.',
            'travel_document_number.required' => 'Unesite broj putne isprave.',
            'expiration_date.required' => 'Unesite datum važenja putne isprave.',
            'state_id.required' => 'Odaberite državljanstvo.'
        ]);
                  
         $guest = Guest::find($guest->id);
         $guest->firstname = $request->get('firstname');
         $guest->lastname =  $request->get('lastname');
         $guest->gender = $request->get('gender');
         $guest->date_of_birth = $request->get('date_of_birth');
         $guest->travel_document = $request->get('travel_document');
         $guest->travel_document_number = $request->get('travel_document_number');
         $guest->expiration_date = $request->get('expiration_date');
         $guest->state_id = $request->get('state_id');
         $guest->save();
         return back()->with('message', 'Gost je izmjenjen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guest $guest)
    {
        $guest = Guest::find($guest->id);
        $guest->delete();

        return back()->with('message', 'Gost je uspješno obrisan!');
    }
}

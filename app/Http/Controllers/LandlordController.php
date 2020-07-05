<?php

namespace App\Http\Controllers;

use App\Landlord;
use App\City;
use Illuminate\Http\Request;

class LandlordController extends Controller
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
        $cities = City::all();
        $landlords = Landlord::latest()->paginate(500);
     
        return view('informant.landlords.index', compact('cities', 'landlords'));
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
            'jmbg'=>'required|min:13|max:13',
            'date_of_birth'=>'required',
            'address'=>'required',
            'city_id'=>'required'
        ],
        [
            'firstname.required' => 'Unesite vaše ime.',
            'firstname.min' => 'Vaše ime mora sadžati bar 3 karaktera',
            'firstname.max' => 'Vaše ime mora sadžati najviše 50 karaktera',
            'lastname.required' => 'Unesite vaše ime.',
            'lastname.min' => 'Vaše ime mora sadžati bar 3 karaktera',
            'lastname.max' => 'Vaše ime mora sadžati najviše 50 karaktera',
            'jmbg.required' => 'Unesite vaše JMBG.',
            'jmbg.min' => 'JMBG mora sadržati tačno 13 karaktera',
            'jmbg.max' => 'JMBG mora sadržati tačno 13 karaktera',
            'date_of_birth.required' => 'Unesite vaš datum rođenja.',
            'address.required' => 'Unesite vašu adresu',
            'city_id.required' => 'Odaberite grad.'
        ]);

        $landlord = new Landlord([
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'jmbg' => $request->get('jmbg'),
            'date_of_birth' => $request->get('date_of_birth'),
            'address' => $request->get('address'),
            'city_id' => $request->get('city_id')
        ]);

        $landlord->save();
        return back()->with('success', 'Stanodavac je sačuvan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Landlord  $landlord
     * @return \Illuminate\Http\Response
     */
    public function show(Landlord $landlord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Landlord  $landlord
     * @return \Illuminate\Http\Response
     */
    public function edit(Landlord $landlord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Landlord  $landlord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Landlord $landlord)
    {

        $request->validate([
            'firstname'=>'required|min:3|max:50',
            'lastname'=>'required|min:3|max:50',
            'jmbg'=>'required|min:13|max:13',
            'date_of_birth'=>'required',
            'address'=>'required',
            'city_id'=>'required'
        ],
        [
            'firstname.required' => 'Unesite vaše ime.',
            'firstname.min' => 'Vaše ime mora sadžati bar 3 karaktera',
            'firstname.max' => 'Vaše ime mora sadžati najviše 50 karaktera',
            'lastname.required' => 'Unesite vaše ime.',
            'lastname.min' => 'Vaše ime mora sadžati bar 3 karaktera',
            'lastname.max' => 'Vaše ime mora sadžati najviše 50 karaktera',
            'jmbg.required' => 'Unesite vaše JMBG.',
            'jmbg.min' => 'JMBG mora sadržati tačno 13 karaktera',
            'jmbg.max' => 'JMBG mora sadržati tačno 13 karaktera',
            'date_of_birth.required' => 'Unesite vaš datum rođenja.',
            'address.required' => 'Unesite vašu adresu',
            'city_id.required' => 'Odaberite grad.'
        ]);


         $landlord = Landlord::find($landlord->id);
         $landlord->firstname = $request->get('firstname');
         $landlord->lastname =  $request->get('lastname');
         $landlord->jmbg = $request->get('jmbg');
         $landlord->date_of_birth = $request->get('date_of_birth');
         $landlord->address = $request->get('address');
         $landlord->city_id = $request->get('city_id');
         $landlord->save();
         return back()->with('message', 'Stanodavac je izmjenjen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Landlord  $landlord
     * @return \Illuminate\Http\Response
     */
    public function destroy(Landlord $landlord)
    {
        $landlord = Landlord::find($landlord->id);
        $landlord->delete();

        return back()->with('message', 'Stanodavac je uspješno obrisan!');
    }
}

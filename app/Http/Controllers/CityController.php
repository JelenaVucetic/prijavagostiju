<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class CityController extends Controller
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
        $cities = City::latest()->paginate(500);
        return view('admin.cities.index', compact('cities'));
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
            'local_tax_underage'=>'required|numeric|between:0,99.99',
            'local_tax_adult'=>'required|numeric|between:0,99.99',
        ],
        [
            'name.required' => 'Unesite vaše ime.',
            'name.min' => 'Vaše ime mora sadžati bar 3 karaktera',
            'name.max' => 'Vaše ime mora sadžati najviše 50 karaktera',
            'local_tax_underage.required' => 'Unesite taksu za maloljetna lica.',
            'local_tax_underage.numeric' => 'Taksa mora biti broj',
            'local_tax_adult.required' => 'Unesite taksu za maloljetna lica.',
            'local_tax_adult.numeric' => 'Taksa mora biti broj',
        ]);

        $city = new City([
            'name' => $request->get('name'),
            'local_tax_underage' => $request->get('local_tax_underage'),
            'local_tax_adult' => $request->get('local_tax_adult'),
        
        ]);

        $city->save();
        return back()->with('success', 'Grad je sačuvan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $request->validate([
            'name'=>'required|min:3|max:50',
            'local_tax_underage'=>'required|numeric|between:0,99.99',
            'local_tax_adult'=>'required|numeric|between:0,99.99',
        ],
        [
            'name.required' => 'Unesite vaše ime.',
            'name.min' => 'Vaše ime mora sadžati bar 3 karaktera',
            'name.max' => 'Vaše ime mora sadžati najviše 50 karaktera',
            'local_tax_underage.required' => 'Unesite taksu za maloljetna lica.',
            'local_tax_underage.numeric' => 'Taksa mora biti broj',
            'local_tax_adult.required' => 'Unesite taksu za maloljetna lica.',
            'local_tax_adult.numeric' => 'Taksa mora biti broj',
        ]);
                  
         $city = City::find($city->id);
         $city->name =  $request->get('name');
         $city->local_tax_underage = $request->get('local_tax_underage');
         $city->local_tax_adult = $request->get('local_tax_adult');
         $city->save();
         return back()->with('message', 'Grad je izmjenjen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city = City::find($city->id);
        $city->delete();

        return back()->with('message', 'Grad je uspješno obrisan!');
    }
}

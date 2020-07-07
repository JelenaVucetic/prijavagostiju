<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Landlord;
use App\City;
use DateTime;
use DatePeriod;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class InformantController extends Controller
{
    public function index() {
        return view('informant.index');
    }

    public function debt(Request $request) {

        $request->validate([
            'check_in'=>'required',
            'check_out'=>'required',
            'landlord_id'=>'required',
        ],
        [
            'check_in.required' => 'Odaberite datum prijave.',
            'check_out.required' => 'OPdaberite datum, odjave.',
            'landlord_name.required' => 'Odaberite stanodavca.'
        ]);

        $period = new DatePeriod(Carbon::parse(request('check_in')), CarbonInterval::day(), Carbon::parse(request('check_out')));
        $count= 0;
        foreach ($period as $date) {
           $count++;
        }

        if($count == 0) {
            return back()->with('message-error', 'Datum prijave mora biti prije datuma odjave.');
        } elseif($request->payment_free == "on") {
    
            DB::table('debts')->insert([
                'check_in' => $request->check_in,
                'check_out' => $request->check_out,
                'landlord_id' => $request->landlord_id,
                'user_id' => Auth::user()->id,
                'guest_id' => $request->guset_id,
                'price' => 0
            ]);
    
            return redirect('/renting')->with('message', 'uspješno ste prijavili gosta.');
        } else {
            $today = (int)Carbon::now()->format('Y');
            $birth = (int)substr($request->date_of_birth, 0 ,4);
            $age = $today - $birth;

            $landlord = Landlord::find($request->landlord_id);
            $taxAdult = $landlord->city->local_tax_adult;
            $taxUnderage = $landlord->city->local_tax_underage;

            if($age > 17) {
                $payment = $count * $taxAdult ;
            } else {
                $payment = $count * $taxUnderage ;
            }

            DB::table('debts')->insert([
                'check_in' => $request->check_in,
                'check_out' => $request->check_out,
                'landlord_id' => $request->landlord_id,
                'user_id' => Auth::user()->id,
                'guest_id' => $request->guset_id,
                'price' => $payment
            ]);

            $lan = DB::table('landlords')
            ->where('id', $request->landlord_id)->first();
            $newDebt =  $lan->debt + $payment;

            DB::table('landlords')->where('id', $request->landlord_id)->update(['debt' => $newDebt]);
            return redirect('/renting')->with('message', 'uspješno ste prijavili gosta.');
        }
    }
    

    public function renting() {
        $rents = DB::table('debts')
                ->join('users', 'users.id', '=', 'debts.user_id')
                ->join('guests', 'guests.id', '=', 'debts.guest_id')
                ->join('landlords', 'landlords.id', '=', 'debts.landlord_id')
                ->join('cities', 'cities.id', '=', 'landlords.city_id')
                ->select('debts.id','users.name as userName','landlords.firstname as lordFirstname','cities.name','guests.firstname as guestFirstname', 'guests.lastname as guestLastname','guests.travel_document_number as guestDocument','debts.check_in', 'debts.check_out', 'debts.price')
                ->get();


        return view('informant.renting', compact('rents'));
    }

    public function destroy(Request $request) {
        DB::table('debts')->where('debts.id', $request->rent_id)->delete();
        return back()->with('message', "Uspješno obrisano.");
    }

    public function showDebt() {
        $cities = City::all();
        $landlords = DB::table('landlords')
                ->join('debts', 'landlords.id', 'debts.landlord_id')
                ->join('cities', 'landlords.city_id', 'cities.id')
                ->select('landlords.*','debts.price','debts.id as debtId','cities.name', 'cities.id as cityId',DB::raw("SUM(debts.price) as total"))
                ->groupBy('landlords.id')
                ->get();

        return view('informant.show_debt', compact('landlords', 'cities'));
    }

    public function payoff(Request $request) {
        $total = $request->totalNew;
        $amount = $request->amount;
        $newTotal = $total-$amount;
        $debts = DB::table('landlords')
              ->where('id', $request->landlordid)
              ->update(['debt' => $newTotal]);
    return back()->with('message', 'Uspješno');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PDFController extends Controller
{
    public function generatePDF(Request $request)
    {
        $id = $request->route('id');
        $info = DB::table('debts')
                    ->where('debts.id', $id )
                    ->join('guests', 'debts.guest_id', 'guests.id')
                    ->join('landlords', 'debts.landlord_id', 'landlords.id')
                    ->join('cities', 'landlords.city_id', 'cities.id')
                    ->select('guests.firstname as guestName', 'guests.lastname as guestLastname', 'guests.travel_document_number as guestDocument',
                            'landlords.firstname as landlordName', 'landlords.lastname as landlordLastname', 'landlords.address', 'cities.name',
                            'debts.price')
                    ->first();
        
         $data = ['guestName' => $info->guestName];
        $pdf = PDF::loadView('myPDF', $data);
  
$current_date_time = Carbon::now()->toDateTimeString();

        return $pdf->download($current_date_time.'.pdf',);
    }
}

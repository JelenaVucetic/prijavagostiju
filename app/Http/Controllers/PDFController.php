<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use DateTime;
use DatePeriod;
use Carbon\Carbon;
use Carbon\CarbonInterval;
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
                    ->join('users', 'debts.user_id', 'users.id')
                    ->select('guests.firstname as guestName', 'guests.lastname as guestLastname', 'guests.travel_document_number as guestDocumentNumber', 'guests.travel_document as guestDocument',
                            'landlords.firstname as landlordName', 'landlords.lastname as landlordLastname', 'landlords.address', 'cities.name',
                            'debts.price', 'debts.check_in','debts.check_out', 'users.name as userName')
                    ->first();
        $period = new DatePeriod(Carbon::parse($info->check_in), CarbonInterval::day(), Carbon::parse($info->check_out));
        $count= 0;
        foreach ($period as $date) {
            $count++;
        }
        $data = ['guestName' => $info->guestName,
                'guestLastname' => $info->guestLastname,
                'guestDocument' => $info->guestDocument,
                'guestDocumentNumber' =>$info->guestDocumentNumber,
                'landlordName' => $info->landlordName,
                'landlordLastname' => $info->landlordLastname,
                'address' => $info->address,
                'city' => $info->name,
                'price' => $info->price,
                'checkIn' => $info->check_in,
                'checkOut' => $info->check_out,
                'userName' => $info->userName,
                'count' => $count
                ];
        $pdf = PDF::loadView('myPDF', $data);
  
        return $pdf->download('Račun.pdf',);
    }
}

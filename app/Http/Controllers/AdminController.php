<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Log;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function logs() {
        $logs = DB::table('logs')->join('users', 'users.id' , '=', 'logs.user_id')->get();

        return view('admin.logs', compact('logs'));
    }

    public function activate(Request $request, $id) {
        $active = DB::table('users')
                ->where('id', $id)
                ->update(['active' => 1]);
        return back()->with('message', "Uspješno ste aktivirali korisnika!");
    }

    public function deactivate(Request $request, $id) {
        $deactivate = DB::table('users')
            ->where('id', $id)
            ->update(['active' => 0]);
        return back()->with('message', "Uspješno ste deaktivirali korisnika!");
    }
}

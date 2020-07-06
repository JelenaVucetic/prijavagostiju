<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use \Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;
    public function redirectTo()
    {
        DB::table('logs')->insert(
            ['user_id' => Auth::user()->id, 
            'activity' => 'prijava',
            "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
            "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
            ]
        );
        switch(Auth::user()->role){
            case 1:
            $this->redirectTo = route("users.index");
            return $this->redirectTo;
                break;
            case 2:
                $this->redirectTo = route('guests.index');
                return $this->redirectTo;
                break;
            case 3:
                $this->redirectTo = route('inspectorDebt');
                return $this->redirectTo;
                break;
            default:
                $this->redirectTo = '/login';
                return $this->redirectTo;
        }
         
        // return $next($request);
    } 

     public function logout(Request $request) {
      
        DB::table('logs')->insert(
            ['user_id' => Auth::user()->id, 
            'activity' => 'odjava',
            "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
            "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
            ]
        );
        Auth::logout();
        return redirect('/');
      }
 
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
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
        $users = User::latest()->paginate(500);
        return view('admin.users.index', compact('users'));
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
            'username'=>'required|min:3|max:50',
            'email'=>'required|email',
            'password' => 'required|confirmed|min:6',
        ],
        [
            'firstname.required' => 'Unesite vaše ime.',
            'firstname.min' => 'Vaše ime mora sadžati bar 3 karaktera',
            'firstname.max' => 'Vaše ime mora sadžati najviše 50 karaktera',
            'lastname.required' => 'Unesite vaše prezime.',
            'lastname.min' => 'Vaše prezime mora sadžati bar 3 karaktera',
            'lastname.max' => 'Vaše prezime mora sadžati najviše 50 karaktera',
            'username.required' => 'Unesite vaše korisničko ime.',
            'username.min' => 'Vaše korisničko mora sadžati bar 3 karaktera',
            'username.max' => 'Vaše korisničko mora sadžati najviše 50 karaktera',
            'email.email' => 'Unestie vaš email u pravilnom formatu, npr. korisnik@gmail.com ',
            'password.confirmed' => 'Potvrđena lozinka se ne poklapa'
        ]);

        $user = new User([
            'name' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'active' => 1,
            'password' =>Hash::make( $request->get('password')),
            'role' => $request->get('role')
        ]);
        $user->save();
        return back()->with('message', 'Korsinik je sačuvan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
       
        $request->validate([
            'firstname'=>'required|min:3|max:50',
            'lastname'=>'required|min:3|max:50',
            'username'=>'required|min:3|max:50',
            'email'=>'required|email'
        ],
        [
            'firstname.required' => 'Unesite vaše ime.',
            'firstname.min' => 'Vaše ime mora sadžati bar 3 karaktera',
            'firstname.max' => 'Vaše ime mora sadžati najviše 50 karaktera',
            'lastname.required' => 'Unesite vaše prezime.',
            'lastname.min' => 'Vaše prezime mora sadžati bar 3 karaktera',
            'lastname.max' => 'Vaše prezime mora sadžati najviše 50 karaktera',
            'username.required' => 'Unesite vaše korisničko ime.',
            'username.min' => 'Vaše korisničko mora sadžati bar 3 karaktera',
            'username.max' => 'Vaše korisničko mora sadžati najviše 50 karaktera'
        ]);

        if($request->password) {
            if (Hash::check($request->password, $user->password)) { 
                $request->validate([
                    'new_password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
                    'password_confirmation' => 'min:6'
                ],
                [
                    'new_password.same' => 'Vrijednosti vaše nove lozinke se ne poklapa sa ponovljenom.',
                    'password_confirmation.min' => 'Ponovljena lozinka mora sadžati bar 6 karaktera',
                    'type.required' => 'You have to choose type of the file!'
                ]);

                $user->fill([
                'password' => Hash::make($request->new_password)
                ])->save();
            
                    
                $user = User::find($user->id);
                $user->name =  $request->get('firstname');
                $user->lastname = $request->get('lastname');
                $user->username = $request->get('username');
                $user->email = $request->get('email');
                $user->save();

                return back()->with('message', 'Korisnik je izmjenjen');
            
            } else {  
                return back()->with('message-error', 'Vaša stara i nova lozinka se ne poklapaju.');
            }
        }
             
         $user = User::find($user->id);
         $user->name =  $request->get('firstname');
         $user->lastname = $request->get('lastname');
         $user->username = $request->get('username');
         $user->email = $request->get('email');
         $user->save();
         return back()->with('message', 'Korisnik je izmjenjen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user = User::find($user->id);
        $user->delete();

        return back()->with('message', 'Korisnik je uspješno obrisan!');
    }
}

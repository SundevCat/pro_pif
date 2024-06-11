<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Hash;

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

    use AuthenticatesUsers{
        logout as performLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function post_login(Request $request){

        Session::flush();

        $input = $request->all();
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        $remember_me = $request->has('remember_me') ? true : false; 

        $user = User::where('email', $request->email)->whereIn('is_admin',array(1,2))->first();
        // dd($user);
        if($user){
            if(Hash::check($request->password , $user->password)){
                if(auth()->attempt(array('email' => $input['email'] , 'password' => $input['password']  ) , $remember_me)){

                    // Session::put('user_id', $user->id);
                    // Session::put('Role', $role_id);
                    // Session::put('Role_name', $Role_name);

        
                    return redirect()->route('main')->with('success', 'You have login successfuly.');
                }else{
                    return redirect()->back()->with('danger', 'You have login falsed.');
                }
            }else{
                return back()->withErrors([
                    'password' => 'Password not macthes.',
                ]);
            }
        }else{
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
        
    

    }
}

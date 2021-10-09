<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


use Illuminate\Support\Facades\Auth; //Import Auth
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function showLoginForm()
    {
        return view('auth.login');
    }
    
    public function userLogin(Request $request)
    {
        
        $messages = [
            "username.required" => "Usuario Obligatoria",
            "username.exists" => "Usuario no existe",
            "password.required" => "Contraseña Obligatoria",
            "password.min" => "La contraseña debe tener al menos 6 caracteres"
        ];
        
        // validate the form data
        $validator = Validator::make($request->all(), [
                'username' => 'required|exists:users,username',
                'password' => 'required|min:6'
            ], $messages);
        //dd($validator->fails());
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
    
            if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'is_admin' => 1], $request->get('remember'))) {
        
                return redirect()->intended('/inicio');
            }
            return back()->withInput($request->only('email'))->withErrors([
                'password' => 'Contraseña Incorrecta.'
            ]);
        }
    }
}

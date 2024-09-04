<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/home';
    protected function redirectTo(){
        if(Auth()->user()->role == 1){
            return route('admin.index');
        }elseif(Auth()->user()->role == 2){
            return route('user.index');
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
    public function login(Request $request){
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
        
        if(auth()->attempt(array('email'=>$input['email'],'password'=>$input['password']))){
         if(auth()->user()->role == 1){
            return redirect()->route('admin.index');
         }elseif(auth()->user()->role == 2){
            return redirect()->route('user.dashboard');

        }else{
            return redirect()->route('login')->with('error','Email and Password are wrong');
        }
    }
}

public function showExamPages(){
    $subjects = subject::where('status', 'active')->paginate(4);
   
    return view('dashboards.users.index', compact('subjects'));
}
}
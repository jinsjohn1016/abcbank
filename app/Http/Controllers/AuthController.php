<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Transaction;
use App\Models\User;
use Session;
use Hash;
use Cookie;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'], 
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function registration()
    {
        return view('auth.register');
    }

    //new user registration
    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $data   = $request->all();
        $check  = $this->create($data);
        return redirect("login")->withSuccess('You have signed-in');
    }

    //user login
    public function customLogin(Request $request)
    {
        $messages = [
            "email.required"    => "Email is required",
            "email.email"       => "Email is not valid",
            "email.exists"      => "Email doesn't exists",
            "password.required" => "Password is required",
            "password.min"      => "Password must be at least 6 characters"
        ];
        $validator = Validator::make($request->all(), [
            'email'     => 'required|email|exists:users,email',
            'password'  => 'required|min:6'
        ], $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            $remember_me = $request->has('remember') ? true : false; 
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password ], $remember_me)) {
			    if($request->has('remember')) {
                    setcookie ("email",$_POST["email"],time()+ (10 * 365 * 24 * 60 * 60));
                    setcookie ("password",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));
                } else {
                    if(isset($_COOKIE["email"])) {
                        setcookie ("email","");
                        if(isset($_COOKIE["password"])) {
                            setcookie ("password","");
                        }
                    }
                }
                return redirect()->route('home');
            }
            return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
                'password' => 'Wrong password',
            ]);
        }
    }
}

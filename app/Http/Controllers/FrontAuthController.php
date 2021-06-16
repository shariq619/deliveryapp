<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FrontAuthController extends Controller
{
    public function check_login(Request $request)
    {
        $email      = $request->input('email');
        $password   = $request->input('password');

        if(Auth::guard('web')->attempt(['email' => $email, 'password' => $password])) {
            return response()->json([
                'success' => true
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Login Fail!'
            ], 401);
        }

    }

    public function store(Request $request)
    {
        $name = $request->input('name');
        $email        = $request->input('email');
        $password     = $request->input('password');

        $user = User::create([
            'name'      => $name,
            'email'     => $email,
            'password'  => Hash::make($password)
        ]);

        Auth::guard()->login($user);

        if($user) {
            return response()->json([
                'success' => true,
                'message' => 'Register Successful!'
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Register Fail!'
            ], 400);
        }

    }
}

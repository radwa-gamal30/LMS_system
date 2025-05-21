<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $user = User::where('email', $credentials['email'])->first();
        if (!$user || !Auth::attempt($credentials)) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }
        $token = $user->createToken('token')->plainTextToken;
            //if return json
            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'Login successful',
                    'token' => $token
                ]);
            }
            //if view blade 
            return redirect()->intended('/home')
                ->with('success', 'Login successfully');
        
    }
    public function logout(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();
        Auth::guard('web')->logout();
        return redirect()->intended('/login')->with('success', 'Logout successfully');
    }
}

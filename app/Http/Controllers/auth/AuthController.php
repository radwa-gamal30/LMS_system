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
       $token= $user->createToken('token')->plainTextToken;
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
           //if return json
            if($request->wantsJson()){
                return response()->json([
                    'message' => 'Login successful',
                    'token' => $token
                ]);
            }
            //if return view
            return redirect()->intended('/home')
                ->with('success', 'Login successfully');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function logout(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->intended('/login')
            ->with('success', 'Logout successfully');   
}
}

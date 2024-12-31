<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(AuthRequest $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            // $request->session()->regenerate();
            $token = $request->user()->createToken('AuthToken')->plainTextToken;
            return response()->json([
                'message' => 'Login berhasil',
                'token' => $token,
                'data' => Auth::user()
            ], 200);
        }
        return response()->json([
            'message' => 'Login gagal',
            'data' => []
        ], 401);
    }

    public function register(AuthRequest $request)
    {
        $user = User::create( [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $token = $user->createToken('AuthToken')->plainTextToken;
        return response()->json([
            'message' => 'Registrasi berhasil',
            'token' => $token,
            'data' => $user
        ], 201);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logout berhasil',
            'data' => []
        ], 200);
    }
}

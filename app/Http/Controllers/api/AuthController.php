<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->only(['logout']);
    }
    public function Register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users|string',
            'password' => 'required|confirmed|string|min:8'
        ]);
        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);
        $token = $user->createToken('myAppToken')->plainTextToken;
        $response = ([
            'user' => $user,
            'token' => $token
        ]);
        return response($response, 201);
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|email|string',
            'password' => 'required|string|min:8'
        ]);
        $user = User::where('email', $fields['email'])->first();
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad Credentials'
            ]);
        }

        $token = $user->createToken('myAppToken')->plainTextToken;
        $response = ([
            'user' => $user,
            'token' => $token
        ]);
        return response($response, 201);
    }

    public function logout(Request $request)
    {
        if (auth()->user()->tokens()->delete()) {
            return response([
                'message' => 'LogOut Successfully'
            ],200);
        }
    }
}

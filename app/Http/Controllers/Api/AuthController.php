<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrasiRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request) {
        $request->validated();

        $credential = $request->only('email', 'password');

        if (!Auth::attempt($credential)) {
            return response()->json(['status'=>false,'error' => 'Email or password wrong'], 401);
        }
        
        $user = User::find(Auth::user()->id);
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status'        => true,
            'data'          => new UserResource($user),
            'token'         => $token
        ]);
    }

    public function registrasi(RegistrasiRequest $request) {
        $data = $request->validated();

        $user = User::create([
            'name'          => $data['name'],
            'email'         => $data['email'],
            'password'      => Hash::make($data['password']),
            'role'          => 'user'
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status'        => true,
            'data'          => new UserResource($user),
            'token'         => $token
        ]);
    }

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status'        => true,
            'message'       => 'Logout successfully'
        ]);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
//     public function __construct()
//     {
//         $this->middleware('auth:api', ['except' => ['login']]);
//     }

    public function login(Request $request)
    {
        $request->validate([
           'email' => 'required|string|email',
           'password' => 'required', 
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user){
            throw ValidationException::withMessages([
                'email' => ['email tidak ditemukan'],
            ]);
        }
        if(!Hash::check($request->password, $user->password)){
            throw ValidationException::withMessages([
                'password' => ['password salah'],
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'jwt-token' => $token,
            'user' => new UserResource($user),
        ]);


    }

    public function logout(Request $request){

    }
}

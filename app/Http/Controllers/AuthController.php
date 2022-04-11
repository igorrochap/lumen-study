<?php

namespace App\Http\Controllers;

use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::query()
            ->where('email', $request->email)
            ->first();

        if(is_null($user) || !Hash::check($request->password, $user->password)) {
            return response()->json(["message" => "Invalid user or password!"], 401);
        }

        $token = JWT::encode(['email' => $user->email], env('JWT_KEY'), "HS256");
        return response()->json(['access_token' => $token]);
    }
}

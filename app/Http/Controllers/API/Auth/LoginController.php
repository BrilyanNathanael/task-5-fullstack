<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(LoginRequest $request)
    {
        if(!$token = auth()->attempt($request->only('email', 'password'))){
            return response(null, 401);
        }

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Success Login!',
            'token' => $token
        ]);
    }
}

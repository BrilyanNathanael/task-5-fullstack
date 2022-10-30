<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __invoke()
    {
        auth()->logout();
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Success Logout!'
        ]);
    }
}

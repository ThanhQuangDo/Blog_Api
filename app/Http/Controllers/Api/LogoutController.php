<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\SessionUser;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function deleteToken(Request $request){
        $token = $request->header('token');
        $checkToken = SessionUser::where('token', $token)->first();

        if($checkToken){
            $checkToken->delete();
        }
        return response()->json('delete success', 200);
    }
}

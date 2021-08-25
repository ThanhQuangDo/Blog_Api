<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\SessionUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function login(Request $request){
        $dataCheckLogin = $request->only('email', 'password');

        // Xác thực user có tài khoản
        if(Auth::attempt($dataCheckLogin)){
            $checkTokenExit = SessionUser::where('user_id', auth()->id())->first();

            if(empty($checkTokenExit)){
                $userSession = SessionUser::create([
                    'token' => Str::random(40),
                    'refresh_token' => Str::random(40),
                    'token_expried' => date('Y-m-d H:i:s', strtotime('+30 day')),
                    'refresh_token_expried' => date('Y-m-d H:i:s', strtotime('+360 day')),
                    'user_id' => auth::id(),
                ]);
            } else {
                $userSession = $checkTokenExit;
            }
            return response()->json($userSession, 200);
        } else{
            return response()->json('username or password fail', 401);
        }
    }
}

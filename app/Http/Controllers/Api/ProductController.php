<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\SessionUser;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request){
        $token = $request->header('token');
        $checkToken = SessionUser::where('token', $token)->first();
        
        if(empty($token)){
            return response()->json('have not token', 401);
        } elseif(empty($checkToken)){
            return response()->json('token fail', 401);
        } else{
            $products = Product::all();
            return response()->json($products, 200);
        }
    }
}

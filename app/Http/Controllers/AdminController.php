<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\PersonalAccessToken;

class AdminController extends Controller
{
    public function login(Request $request)
    {

        $user = User::where('email', $request->email)->first();
        
  
        if($user && Hash::check($request->password, $user->password)){
            return response($user->createToken("front")->plainTextToken,200);
        }
        else{
            throw ValidationException::withMessages([
                "пользователь не найден"
            ]);
        }
    }
    public function checkAuth(Request $request)
    {
        if(isset($request->token)){
            $token = PersonalAccessToken::findToken($request->token);

            if(!$token){
                return response(403, 'Forbidden');
            }
            $user = $token->tokenable;
            return $user;
        }
        return response(403, 'Forbidden');
    }
    public function createProuct(Request $request)
    {
        $model = new Product();
        $model->name = $request->title;
        $model->description = $request->content;
        $model->price = $request->price;
        $model->category_id = $request->category;
        $model->save();
        return response(200);
    }
}

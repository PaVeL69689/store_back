<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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
}

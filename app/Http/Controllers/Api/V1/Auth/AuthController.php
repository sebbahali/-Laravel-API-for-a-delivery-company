<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
class AuthController extends Controller
{
   public function register(AuthRequest $request){

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => hash::make($request->password),
            ]);

            return response()->json([
                'user_info' => $user
            ]);

   }

   public function login(Request $request){

        $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

  $user = User::where('email', $request->email)->first();
   
  if(! $user || ! Hash::check($request->password,$user->password)){

return response()->json(['error'=>'email or password is not correct'],422);

  }
  
  $device = substr($request->userAgent() ?? '', 0, 255);

return response()->json(['access_token' =>$user->createtoken($device,['Driver:update'])->plainTextToken]);

   }

   public function logout(User $user)
   {
        $user->tokens()->delete();

        return response()->json([
                'details' => 'you are loged out ',
        ]);

   }
}

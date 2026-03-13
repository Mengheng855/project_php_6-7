<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens; 
class UserController extends Controller
{
    public function user(){
        $data=User::all();
        return apiResponse($data,200,"successfully");
    }
    public function register(Request $req){
        $data=$req->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);
        User::create($data);
        return apiResponse($data,201,'register successfully');
    }
    public function login(Request $req){
        $data = $req->only(['email', 'password']); 
        if(!Auth::attempt($data)){
            return apiResponse(null,401,'Invalid credentials');
        }
        $user=Auth::user();
        $user->tokens()->delete();
        $token=$user->createToken('auth_token')->plainTextToken;
        return apiResponse([
            'access_token' => $token,
            'token_type'   => 'Bearer',
            'is_admin'     => (bool) $user->is_admin,
            'user'         => [
                'id'    => $user->id,
                'name'  => $user->name,
                'email' => $user->email,
            ],
        ]);
    }
}

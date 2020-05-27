<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function register(Request $request){
        $this->validate($request,[
           'name'=>'required|string|max:255',
            'email'=>'required|string|email',
            'password'=>'required|string|confirmed'
        ]);
        $user = new User([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>bcrypt($request->input('password'))
        ]);

        if ($user->save()){
            return response()->json([
               'message'=>'User Created successfully !',
               'status_code'=>201
            ], 201);
        }else{
            return response()->json([
                'message'=>'Some error occurred, Please try again',
                'status_code'=>500
            ], 500);
        }
    }

    public function login(Request $request){
        $this->validate($request,[
            'email'=>'required|string|email',
            'password'=>'required|string',
            'remember_me'=>'boolean'
        ]);

        if (!Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return response()->json([
               'message'=>'Unauthorized',
                'status_code'=> 401
            ],401);
        }
        $user=$request->user();

        if ($user->role == 'administrator'){
            $tokenData = $user->createToken('Personal Access Token', ['do_anything']);
        }else{
            $tokenData = $user->createToken('Personal Access Token', ['can_create']);

        }

        $token = $tokenData->token;

        if ($request->remember_me){
            $token->expires_at = Carbon::now()->addWeek(1);
        }
        if ($token->save()){
            return response()->json([
                'user'=>$user,
                'access_token'=>$tokenData->accessToken,
                'token_type'=>'Bearer',
                'token_scope'=>$tokenData->token->scopes[0],
                'expires_at'=>Carbon::parse($tokenData->token->expipes_at)->toDateTimeString(),
                'status_code'=>200
            ],200);
        }else{
            return response()->json([
                'message'=>'Some error occurred, Please try again',
                'status_code'=>500
            ],500);
        }
    }
}

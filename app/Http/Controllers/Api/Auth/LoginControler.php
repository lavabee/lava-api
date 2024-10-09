<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use  \App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginControler extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(LoginRequest $request)
    {

        $user = User::where('email', $request->email)->first();
        if(!$user || !\Hash::check($request->password, $user->password)){
            throw ValidationException::withMessages([
               'password' =>  'password incorrect'
            ]);
        }

        /*if(!auth()->attempt($request->only(['email', 'password']))){
            throw ValidationException::withMessages([
                'password' =>  'password incorrect'
            ]);
        }*/
        return response()->json([
            'user' => $user,
            'token' => $user->createToken('laravel_api_token')->plainTextToken
        ]);
    }
}

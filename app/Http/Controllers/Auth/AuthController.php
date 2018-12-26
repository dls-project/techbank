<?php
namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

class AuthController extends Controller
{
    public function test() {
        echo("aaaaaaaa");
        
        return "aaaaaaaa";
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        if(!$token = auth()->attempt($request->only(['email', 'password'])))
        {
            return response()->json([
                'errors' => [
                    'email' => ['There is something wrong! We could not verify details']
            ]], 422);
        }

        return (new UserResource($request->user()))
                ->additional([
                    'meta' => [
                        'token' => $token
                    ]
                ]);
    }

    public function user(Request $request)
    {
        return new UserResource($request->user());
    }

    public function logout()
    {
        auth()->logout();
    }

}
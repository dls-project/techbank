<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserLoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

class AuthController extends Controller
{

    public function login(UserLoginRequest $request) {
		if (!$token = auth()->attempt($request->only(['email', 'password']))) {
			return response()->json([
				'errors' => [
					'email' => ['Sorry we cant find you with those details.'],
				],
			], 422);
		};
		return (new UserResource($request->user()))->additional([
            'meta' => [
				'token' => $token,
			],
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
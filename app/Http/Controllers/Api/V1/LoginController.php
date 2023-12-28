<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function __invoke(LoginRequest $request): JsonResponse
    {
        if (!auth()->attempt($request->only(['email', 'password']))){
            throw ValidationException::withMessages([
                'email' => ['The credentials you entered are incorrect.']
            ]);
        }
        $user = User::where('email', $request->email)->first();
        return response()->customJson(
            ['token' => $user->createToken("API TOKEN")->plainTextToken],
            'User Logged In Successfully',
            200
        );

    }
}

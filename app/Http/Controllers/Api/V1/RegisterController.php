<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request)
    {
        $user = User::create($request->getData());
        return response()->customJson(
            ['token' => $user->createToken("API TOKEN")->plainTextToken],
            'User Created Successfully',
            200
        );
    }
}

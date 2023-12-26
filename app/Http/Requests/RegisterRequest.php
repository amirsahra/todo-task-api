<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255'],
            'password' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
        ];
    }

    public function getData()
    {
        $data = $this->validated();
        $data['password'] = Hash::make($data['password']);
        return $data;
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->customJson(
                ['errors' => $validator->errors()],
                'Validation errors',
                401
            )
        );


    }
}

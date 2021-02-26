<?php

namespace App\Exceptions;

use Illuminate\Contracts\Validation\Validator;
use Exception;

class RegisterUserValidationException extends Exception
{
    protected $validator;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    public function render()
    {
        return response()->json([
            'message' => $this->validator->errors()->first(),
            'code' => 422,
            'status' => 'error'
        ], 422);
    }
}

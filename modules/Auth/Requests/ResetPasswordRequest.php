<?php

declare(strict_types=1);

namespace Modules\Auth\Requests;
use Illuminate\Foundation\Http\FormRequest;
class ResetPasswordRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'identifier' => 'required|string',
            'otp' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ];
    }

    public function credentials(): array
    {
        return $this->only('identifier', 'password','otp');
    }
}

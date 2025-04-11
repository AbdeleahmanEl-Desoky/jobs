<?php

declare(strict_types=1);

namespace Modules\Auth\Requests;
use Illuminate\Foundation\Http\FormRequest;
class VerifyOtpRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'identifier'    => 'required',
            'otp' => 'required',
        ];
    }

    public function credentials(): array
    {
        return $this->only('identifier', 'otp');
    }
}

<?php

declare(strict_types=1);

namespace Modules\Auth\Requests;

use App\Rules\UniqueEmailOrPhone;
use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\Auth\Commands\UpdateAuthCommand;
use Modules\Auth\Handlers\UpdateAuthHandler;

class ForgotPasswordRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
        ];
    }

}

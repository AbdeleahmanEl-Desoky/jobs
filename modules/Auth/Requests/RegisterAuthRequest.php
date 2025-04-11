<?php

declare(strict_types=1);

namespace Modules\Auth\Requests;

use App\Rules\UniqueEmailOrPhone;
use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\Auth\DTO\CreateAuthDTO;

class RegisterAuthRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => ['required', 'email', new UniqueEmailOrPhone('email')],
            'phone' => ['required', new UniqueEmailOrPhone('phone')],
            'password' => 'required',
            'type'     => 'required|in:user,company',
        ];
    }

    public function createCreateAuthDTO(): CreateAuthDTO
    {
        return new CreateAuthDTO(
            name: $this->get('name'),
            email: $this->get('email'),
            password: $this->get('password'),
            type: $this->get('type'),
            phone: $this->get(key: 'phone'),
        );
    }
}

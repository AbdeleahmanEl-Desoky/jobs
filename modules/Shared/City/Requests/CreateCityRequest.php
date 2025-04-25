<?php

declare(strict_types=1);

namespace Modules\Shared\City\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\Shared\City\DTO\CreateCityDTO;

class CreateCityRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
        ];
    }

    public function createCreateCityDTO(): CreateCityDTO
    {
        return new CreateCityDTO(
            name: $this->get('name'),
        );
    }
}

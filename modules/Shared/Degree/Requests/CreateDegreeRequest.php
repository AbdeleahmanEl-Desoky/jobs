<?php

declare(strict_types=1);

namespace Modules\Shared\Degree\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\Shared\Degree\DTO\CreateDegreeDTO;

class CreateDegreeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
        ];
    }

    public function createCreateDegreeDTO(): CreateDegreeDTO
    {
        return new CreateDegreeDTO(
            name: $this->get('name'),
        );
    }
}

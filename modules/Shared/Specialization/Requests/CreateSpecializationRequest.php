<?php

declare(strict_types=1);

namespace Modules\Shared\Specialization\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\Shared\Specialization\DTO\CreateSpecializationDTO;

class CreateSpecializationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
        ];
    }

    public function createCreateSpecializationDTO(): CreateSpecializationDTO
    {
        return new CreateSpecializationDTO(
            name: $this->get('name'),
        );
    }
}

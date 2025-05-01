<?php

declare(strict_types=1);

namespace Modules\Shared\StatusEmployment\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\Shared\StatusEmployment\DTO\CreateStatusEmploymentDTO;

class CreateStatusEmploymentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
        ];
    }

    public function createCreateStatusEmploymentDTO(): CreateStatusEmploymentDTO
    {
        return new CreateStatusEmploymentDTO(
            name: $this->get('name'),
        );
    }
}

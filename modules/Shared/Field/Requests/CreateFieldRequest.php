<?php

declare(strict_types=1);

namespace Modules\Shared\Field\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\Shared\Field\DTO\CreateFieldDTO;

class CreateFieldRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
        ];
    }

    public function createCreateFieldDTO(): CreateFieldDTO
    {
        return new CreateFieldDTO(
            name: $this->get('name'),
        );
    }
}

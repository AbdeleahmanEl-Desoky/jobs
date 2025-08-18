<?php

declare(strict_types=1);

namespace Modules\CoreUser\Saved\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\CoreUser\Saved\DTO\CreateSavedDTO;

class CreateSavedRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
        ];
    }

    public function createCreateSavedDTO(): CreateSavedDTO
    {
        return new CreateSavedDTO(
            name: $this->get('name'),
        );
    }
}

<?php

declare(strict_types=1);

namespace Modules\Shared\Category\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\Shared\Category\DTO\CreateCategoryDTO;

class CreateCategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
        ];
    }

    public function createCreateCategoryDTO(): CreateCategoryDTO
    {
        return new CreateCategoryDTO(
            name: $this->get('name'),
        );
    }
}

<?php

declare(strict_types=1);

namespace Modules\Shared\Category\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\Shared\Category\Commands\UpdateCategoryCommand;
use Modules\Shared\Category\Handlers\UpdateCategoryHandler;

class UpdateCategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
        ];
    }

    public function createUpdateCategoryCommand(): UpdateCategoryCommand
    {
        return new UpdateCategoryCommand(
            id: Uuid::fromString($this->route('id')),
            name: $this->get('name'),
        );
    }
}

<?php

declare(strict_types=1);

namespace Modules\Shared\Field\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\Shared\Field\Commands\UpdateFieldCommand;
use Modules\Shared\Field\Handlers\UpdateFieldHandler;

class UpdateFieldRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
        ];
    }

    public function createUpdateFieldCommand(): UpdateFieldCommand
    {
        return new UpdateFieldCommand(
            id: Uuid::fromString($this->route('id')),
            name: $this->get('name'),
        );
    }
}

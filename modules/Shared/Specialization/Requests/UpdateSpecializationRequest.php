<?php

declare(strict_types=1);

namespace Modules\Shared\Specialization\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\Shared\Specialization\Commands\UpdateSpecializationCommand;
use Modules\Shared\Specialization\Handlers\UpdateSpecializationHandler;

class UpdateSpecializationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
        ];
    }

    public function createUpdateSpecializationCommand(): UpdateSpecializationCommand
    {
        return new UpdateSpecializationCommand(
            id: Uuid::fromString($this->route('id')),
            name: $this->get('name'),
        );
    }
}

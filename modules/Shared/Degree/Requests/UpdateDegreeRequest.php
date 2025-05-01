<?php

declare(strict_types=1);

namespace Modules\Shared\Degree\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\Shared\Degree\Commands\UpdateDegreeCommand;
use Modules\Shared\Degree\Handlers\UpdateDegreeHandler;

class UpdateDegreeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
        ];
    }

    public function createUpdateDegreeCommand(): UpdateDegreeCommand
    {
        return new UpdateDegreeCommand(
            id: Uuid::fromString($this->route('id')),
            name: $this->get('name'),
        );
    }
}

<?php

declare(strict_types=1);

namespace Modules\Shared\StatusEmployment\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\Shared\StatusEmployment\Commands\UpdateStatusEmploymentCommand;
use Modules\Shared\StatusEmployment\Handlers\UpdateStatusEmploymentHandler;

class UpdateStatusEmploymentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
        ];
    }

    public function createUpdateStatusEmploymentCommand(): UpdateStatusEmploymentCommand
    {
        return new UpdateStatusEmploymentCommand(
            id: Uuid::fromString($this->route('id')),
            name: $this->get('name'),
        );
    }
}

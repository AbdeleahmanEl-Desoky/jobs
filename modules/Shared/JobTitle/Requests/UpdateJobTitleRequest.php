<?php

declare(strict_types=1);

namespace Modules\Shared\JobTitle\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\Shared\JobTitle\Commands\UpdateJobTitleCommand;
use Modules\Shared\JobTitle\Handlers\UpdateJobTitleHandler;

class UpdateJobTitleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
        ];
    }

    public function createUpdateJobTitleCommand(): UpdateJobTitleCommand
    {
        return new UpdateJobTitleCommand(
            id: Uuid::fromString($this->route('id')),
            name: $this->get('name'),
        );
    }
}

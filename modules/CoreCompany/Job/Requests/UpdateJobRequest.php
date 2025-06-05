<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Job\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\CoreCompany\Job\Commands\UpdateJobCommand;
use Modules\CoreCompany\Job\Handlers\UpdateJobHandler;

class UpdateJobRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
        ];
    }

    public function createUpdateJobCommand(): UpdateJobCommand
    {
        return new UpdateJobCommand(
            id: Uuid::fromString($this->route('id')),
            name: $this->get('name'),
        );
    }
}

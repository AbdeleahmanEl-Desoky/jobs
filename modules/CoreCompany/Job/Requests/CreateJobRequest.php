<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Job\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\CoreCompany\Job\DTO\CreateJobDTO;

class CreateJobRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
        ];
    }

    public function createCreateJobDTO(): CreateJobDTO
    {
        return new CreateJobDTO(
            name: $this->get('name'),
        );
    }
}

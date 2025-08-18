<?php

declare(strict_types=1);

namespace Modules\CoreUser\Archived\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\CoreUser\Archived\DTO\CreateArchivedDTO;

class CreateArchivedRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
        ];
    }

    public function createCreateArchivedDTO(): CreateArchivedDTO
    {
        return new CreateArchivedDTO(
            name: $this->get('name'),
        );
    }
}

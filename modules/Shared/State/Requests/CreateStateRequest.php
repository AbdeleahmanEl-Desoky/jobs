<?php

declare(strict_types=1);

namespace Modules\Shared\State\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\Shared\State\DTO\CreateStateDTO;

class CreateStateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
        ];
    }

    public function createCreateStateDTO(): CreateStateDTO
    {
        return new CreateStateDTO(
            name: $this->get('name'),
        );
    }
}

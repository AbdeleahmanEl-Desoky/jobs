<?php

declare(strict_types=1);

namespace Modules\Shared\City\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\Shared\City\Commands\UpdateCityCommand;
use Modules\Shared\City\Handlers\UpdateCityHandler;

class UpdateCityRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
        ];
    }

    public function createUpdateCityCommand(): UpdateCityCommand
    {
        return new UpdateCityCommand(
            id: Uuid::fromString($this->route('id')),
            name: $this->get('name'),
        );
    }
}

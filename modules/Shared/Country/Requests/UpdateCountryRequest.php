<?php

declare(strict_types=1);

namespace Modules\Shared\Country\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\Shared\Country\Commands\UpdateCountryCommand;
use Modules\Shared\Country\Handlers\UpdateCountryHandler;

class UpdateCountryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
        ];
    }

    public function createUpdateCountryCommand(): UpdateCountryCommand
    {
        return new UpdateCountryCommand(
            id: Uuid::fromString($this->route('id')),
            name: $this->get('name'),
        );
    }
}

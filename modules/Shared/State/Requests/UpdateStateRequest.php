<?php

declare(strict_types=1);

namespace Modules\Shared\State\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\Shared\State\Commands\UpdateStateCommand;
use Modules\Shared\State\Handlers\UpdateStateHandler;

class UpdateStateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
        ];
    }

    public function createUpdateStateCommand(): UpdateStateCommand
    {
        return new UpdateStateCommand(
            id: Uuid::fromString($this->route('id')),
            name: $this->get('name'),
        );
    }
}

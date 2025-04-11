<?php

declare(strict_types=1);

namespace Modules\CoreUser\User\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\CoreUser\User\Commands\UpdateUserCommand;
use Modules\CoreUser\User\Handlers\UpdateUserHandler;

class UpdateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
        ];
    }

    public function createUpdateUserCommand(): UpdateUserCommand
    {
        return new UpdateUserCommand(
            id: Uuid::fromString($this->route('id')),
            name: $this->get('name'),
        );
    }
}

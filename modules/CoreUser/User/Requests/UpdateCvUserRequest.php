<?php

declare(strict_types=1);

namespace Modules\CoreUser\User\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\CoreUser\User\Commands\UpdateCvUserCommand;
use Ramsey\Uuid\Uuid;


class UpdateCvUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'file' => 'required|file',
        ];
    }

    public function createUpdateCvUserCommand(): UpdateCvUserCommand
    {
        return new UpdateCvUserCommand(
            id: Uuid::fromString(uuid: auth('api_user')->user()->id),
            file: $this->file('file'),
        );
    }
}

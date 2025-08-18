<?php

declare(strict_types=1);

namespace Modules\CoreUser\UserJob\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\CoreUser\UserJob\Commands\SaveJobCommand;
use Ramsey\Uuid\Uuid;

class SavedJobRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'reason' => ['nullable', 'string', 'max:500'],
            'user_id' => ['nullable', 'string', 'uuid'],
        ];
    }

    public function createSaveJobCommand(): SaveJobCommand
    {
        $currentUserId = Uuid::fromString(auth('api_user')->id());

        return new SaveJobCommand(
            id: Uuid::fromString($this->route('id')),
            userId: $this->get('user_id', $currentUserId),
        );
    }
}

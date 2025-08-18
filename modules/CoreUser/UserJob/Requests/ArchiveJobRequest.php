<?php

declare(strict_types=1);

namespace Modules\CoreUser\UserJob\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\CoreUser\UserJob\Commands\ArchiveJobCommand;
use Ramsey\Uuid\Uuid;

class ArchiveJobRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'reason' => ['nullable', 'string', 'max:500'],
            'user_id' => ['nullable', 'string', 'uuid'],
        ];
    }

    public function createArchiveApplyJobCommand(): ArchiveJobCommand
    {
        $currentUserId = auth('api_user')->id();

        return new ArchiveJobCommand(
            id: Uuid::fromString($this->route('id')),
            userId: $this->get('user_id', $currentUserId),
            reason: $this->get('reason'),
        );
    }
}

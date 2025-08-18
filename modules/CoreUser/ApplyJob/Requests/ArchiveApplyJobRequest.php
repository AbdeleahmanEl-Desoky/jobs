<?php

declare(strict_types=1);

namespace Modules\CoreUser\ApplyJob\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\CoreUser\ApplyJob\Commands\ArchiveApplyJobCommand;
use Ramsey\Uuid\Uuid;

class ArchiveApplyJobRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'reason' => ['nullable', 'string', 'max:500'],
            'user_id' => ['nullable', 'string', 'uuid'],
        ];
    }

    public function createArchiveApplyJobCommand(): ArchiveApplyJobCommand
    {
        $currentUserId = auth('api_user')->id();

        return new ArchiveApplyJobCommand(
            id: Uuid::fromString($this->route('id')),
            userId: $this->get('user_id', $currentUserId),
            reason: $this->get('reason'),
        );
    }
}

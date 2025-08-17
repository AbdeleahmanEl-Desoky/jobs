// Modules/CoreUser/ApplyJob/Requests/UpdateApplyJobRequest.php
<?php

declare(strict_types=1);

namespace Modules\CoreUser\ApplyJob\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\CoreUser\ApplyJob\Commands\UpdateApplyJobCommand;

class UpdateApplyJobRequest extends FormRequest
{
    public function rules(): array
    {
        // All fields for update can be optional, as it's a partial update
        return [
            'cover_letter' => ['nullable', 'string'],
            'agree_privacy_policy' => ['nullable', 'boolean'],
            'agree_future_job' => ['nullable', 'boolean'],
        ];
    }

    public function createUpdateApplyJobCommand(): UpdateApplyJobCommand
    {
        // Use $this->has() to differentiate between 'not provided' and 'provided as null'
        return new UpdateApplyJobCommand(
            id: Uuid::fromString($this->route('id')),
            coverLetter: $this->has('cover_letter') ? $this->get('cover_letter') : null,
            agreePrivacyPolicy: $this->has('agree_privacy_policy') ? (bool) $this->get('agree_privacy_policy') : null,
            agreeFutureJob: $this->has('agree_future_job') ? (bool) $this->get('agree_future_job') : null,
        );
    }
}

<?php

declare(strict_types=1);

namespace Modules\CoreUser\ApplyJob\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\CoreUser\ApplyJob\DTO\CreateApplyJobDTO;

class CreateApplyJobRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'company_id' => ['required', 'string', 'uuid'], // Validate as UUID string
            'user_id' => ['required', 'string'],
            'employee_job_id' => ['required', 'string'],
            'cover_letter' => ['nullable', 'string'],
            'agree_privacy_policy' => ['required', 'boolean'], // Expect boolean, will be cast to tinyInteger by model
            'agree_future_job' => ['required', 'boolean'],     // Expect boolean
            'cv_file' => ['nullable', 'file'],
            'additional_file' => ['nullable', 'file'],
        ];
    }

    public function createCreateApplyJobDTO(): CreateApplyJobDTO
    {
        return new CreateApplyJobDTO(
            companyId: Uuid::fromString($this->get('company_id')),
            userId: $this->get('user_id'),
            employeeJobId: $this->get('employee_job_id'),
            coverLetter: $this->get('cover_letter'),
            agreePrivacyPolicy: (bool) $this->get('agree_privacy_policy'),
            agreeFutureJob: (bool) $this->get('agree_future_job'),
            cvFile: $this->file('cv_file'),
            additionalFile: $this->file('additional_file'),
        );
    }
}

<?php

declare(strict_types=1);

namespace Modules\CoreUser\ApplyJob\DTO;

use Ramsey\Uuid\UuidInterface;
use Illuminate\Http\UploadedFile;
class CreateApplyJobDTO
{
    public function __construct(
        private UuidInterface $companyId,
        private string $userId,
        private string $employeeJobId,
        private ?string $coverLetter = null,
        private bool $agreePrivacyPolicy = false,
        private bool $agreeFutureJob = false,
        private ?UploadedFile $cvFile = null,
        private ?UploadedFile $additionalFile = null,
    ) {
    }

    public function getCompanyId(): UuidInterface
    {
        return $this->companyId;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function getEmployeeJobId(): string
    {
        return $this->employeeJobId;
    }

    public function getCoverLetter(): ?string
    {
        return $this->coverLetter;
    }

    public function getAgreePrivacyPolicy(): bool
    {
        return $this->agreePrivacyPolicy;
    }

    public function getAgreeFutureJob(): bool
    {
        return $this->agreeFutureJob;
    }
    public function getCvFile(): ?UploadedFile
    {
        return $this->cvFile;
    }
    public function getAdditionalFile(): ?UploadedFile
    {
        return $this->additionalFile;
    }

    public function toArray(): array
    {
        return [
            'company_id' => $this->companyId->toString(),
            'user_id' => $this->userId,
            'employee_job_id' => $this->employeeJobId,
            'cover_letter' => $this->coverLetter,
            'agree_privacy_policy' => $this->agreePrivacyPolicy,
            'agree_future_job' => $this->agreeFutureJob,
        ];
    }
}

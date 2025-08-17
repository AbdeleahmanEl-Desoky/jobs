<?php

declare(strict_types=1);

namespace Modules\CoreUser\ApplyJob\Commands;

use Ramsey\Uuid\UuidInterface;

class UpdateApplyJobCommand
{
    public function __construct(
        private UuidInterface $id,
        private ?string $coverLetter = null,
        private ?bool $agreePrivacyPolicy = null,
        private ?bool $agreeFutureJob = null,
    ) {
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function getCoverLetter(): ?string
    {
        return $this->coverLetter;
    }

    public function getAgreePrivacyPolicy(): ?bool
    {
        return $this->agreePrivacyPolicy;
    }

    public function getAgreeFutureJob(): ?bool
    {
        return $this->agreeFutureJob;
    }

    public function toArray(): array
    {
        return array_filter([
            'cover_letter' => $this->coverLetter,
            'agree_privacy_policy' => $this->agreePrivacyPolicy,
            'agree_future_job' => $this->agreeFutureJob,
        ], fn ($value) => !is_null($value)); // Only include non-null values for partial updates
    }
}

<?php

declare(strict_types=1);

namespace Modules\CoreUser\User\Commands;

use Ramsey\Uuid\UuidInterface;
use Illuminate\Http\UploadedFile;

class UpdateUserCommand
{
    public function __construct(
        private UuidInterface $id,
        private string $name,
        private string $lastName,
        private string $email,
        private string $phone,
        private string $phonecode,
        private int $countryId,
        private int $cityId,
        private string $postalCode,
        private int $minimumSalaryAmount,
        private string $paymentPeriod,
        private string $about,
        private string $statusEmploymentId,
        private string $jobTitleId,
        private ?UploadedFile $file,
    ) {
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
    public function getFile(): ?UploadedFile
    {
        return $this->file;
    }
    public function toArray(): array
    {
        return array_filter([
            'name' => $this->name,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'phone' => $this->phone,
            'phonecode' => $this->phonecode,
            'country_id' => $this->countryId,
            'city_id' => $this->cityId,
            'postal_code' => $this->postalCode,
            'minimum_salary_amount' => $this->minimumSalaryAmount,
            'payment_period' => $this->paymentPeriod,
            'about' => $this->about,
            'status_employment_id' => $this->statusEmploymentId,
            'job_title_id' => $this->jobTitleId,
            'file' => $this->file?->getClientOriginalName(),
        ]);
    }
}

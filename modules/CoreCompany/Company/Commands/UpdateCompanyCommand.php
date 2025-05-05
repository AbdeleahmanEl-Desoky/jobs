<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Company\Commands;

use Ramsey\Uuid\UuidInterface;
use Illuminate\Http\UploadedFile;
class UpdateCompanyCommand
{
    public function __construct(
        private UuidInterface $id,
        private string $name,
        private ?string $lastName = null,
        private ?string $email = null,
        private ?string $phone = null,
        private ?string $phonecode = null,
        private ?string $countryId = null,
        private ?string $cityId = null,
        private ?string $postalCode = null,
        private ?string $minimumSalaryAmount = null,
        private ?string $paymentPeriod = null,
        private ?string $about = null,
        private ?string $fieldId = null,
        private ?string $companySizeId = null,
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
            'field_id' => $this->fieldId,
            'company_size_id' => $this->companySizeId,
        ], fn ($value) => !is_null($value) && $value !== '');
    }
}

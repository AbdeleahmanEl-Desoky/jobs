<?php

declare(strict_types=1);

namespace Modules\CoreUser\Education\Commands;

use Ramsey\Uuid\UuidInterface;

class UpdateEducationCommand
{
    public function __construct(
        private UuidInterface $id,
        private string $degree_id,
        private string $country_id,
        private string $city_id,
        private string $field_id,
        private string $specialization_id,
        private string $university_id,
        private string $date_from,
        private string $date_to,
        private string $graduation_grade_type,
        private int $graduation_grade_value,
        private ?string $description = null,
    ) {
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function toArray(): array
    {
        return array_filter([
            'degree_id' => $this->degree_id,
            'country_id' => $this->country_id,
            'city_id' => $this->city_id,
            'field_id' => $this->field_id,
            'specialization_id' => $this->specialization_id,
            'university_id' => $this->university_id,
            'date_from' => $this->date_from,
            'date_to' => $this->date_to,
            'graduation_grade_type' => $this->graduation_grade_type,
            'graduation_grade_value' => $this->graduation_grade_value,
            'description' => $this->description,
        ]);
    }
}

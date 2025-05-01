<?php

declare(strict_types=1);

namespace Modules\CoreUser\Education\DTO;

use Ramsey\Uuid\UuidInterface;

class CreateEducationDTO
{
    public function __construct(
        public UuidInterface $user_id,
        public string $degree_id,
        public string $country_id,
        public string $city_id,
        public string $field_id,
        public string $specialization_id,
        public string $university_id,
        public string $date_from,
        public string $date_to,
        public string $graduation_grade_type,
        public int $graduation_grade_value,
        public ?string $description = null,
    ) {
    }

    public function toArray(): array
    {
        return [
            'user_id' => $this->user_id,
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
        ];
    }
}

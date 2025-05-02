<?php

declare(strict_types=1);

namespace Modules\CoreUser\Experience\DTO;

use Ramsey\Uuid\UuidInterface;

class CreateExperienceDTO
{
    public function __construct(
        public UuidInterface $user_id,
        public string $position_title,
        public string $company_name,
        public string $company_field_id,
        public string $company_size_id,
        public string $job_title_id,
        public string $country_id,
        public string $city_id,
        public string $field_id,
        public string $date_from,
        public string $date_to,
        public string $description,
        public int $find_job,
    ) {
    }

    public function toArray(): array
    {
        return [
            'user_id' => $this-> user_id,
            'position_title'=> $this->position_title,
            'company_name'=> $this->company_name,
            'company_field_id'=> $this->company_field_id,
            'company_size_id'=> $this->company_size_id,
            'job_title_id'=> $this->job_title_id,
            'country_id'=> $this->country_id,
            'city_id'=> $this->city_id,
            'field_id'=> $this->field_id,
            'date_from'=> $this->date_from,
            'date_to'=> $this->date_to,
            'description'=> $this->description,
            'find_job'=> $this->find_job,
        ];
    }
}

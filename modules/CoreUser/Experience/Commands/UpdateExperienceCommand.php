<?php

declare(strict_types=1);

namespace Modules\CoreUser\Experience\Commands;

use Ramsey\Uuid\UuidInterface;

class UpdateExperienceCommand
{
    public function __construct(
        private UuidInterface $id,
        private string $position_title,
        private string $company_name,
        private string $company_field_id,
        private string $company_size_id,
        private string $job_title_id,
        private string $country_id,
        private string $city_id,
        private string $field_id,
        private string $date_from,
        private string $date_to,
        private string $description,
        private bool $find_job
        ) {
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function toArray(): array
    {
        return array_filter([
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
        ]);
    }
}

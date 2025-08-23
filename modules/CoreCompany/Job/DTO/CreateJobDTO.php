<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Job\DTO;

class CreateJobDTO
{
    public function __construct(
        public string $company_id,
        public string $job_title_id,
        public ?string $position_description,
        public ?string $company_description,
        // public ?array $skill_ids, // <<< REMOVE THIS
        public ?string $employee_description,
        public ?string $team_description,
        public ?array $interview,
        public string $salary_form,
        public string $salary_to,
        public string $pay,
        // public array $category_ids, // <<< REMOVE THIS
        public ?string $type,
        public ?array $skillIds = null,   // <<< ADD for relation handling
        public ?array $categoryIds = null, // <<< ADD for relation handling
        public ?int $country_id,
        public ?int $city_id
    ) {}

    public function toArray(): array
    {
        return [
            'company_id' => $this->company_id,
            'job_title_id' => $this->job_title_id,
            'position_description' => $this->position_description,
            'company_description' => $this->company_description,
            // 'skill_ids' => $this->skill_ids, // <<< REMOVE THIS
            'employee_description' => $this->employee_description,
            'team_description' => $this->team_description,
            'interview' => $this->interview,
            'salary_form' => $this->salary_form,
            'salary_to' => $this->salary_to,
            'pay' => $this->pay,
            // 'category_ids' => $this->category_ids, // <<< REMOVE THIS
            'type' => $this->type,
            'skillIds' => $this->skillIds,
            'categoryIds' => $this->categoryIds,
            'country_id' => $this->country_id,
            'city_id' => $this->city_id
        ];
    }
}

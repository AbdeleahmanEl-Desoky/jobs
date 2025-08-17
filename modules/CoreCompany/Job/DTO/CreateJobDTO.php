<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Job\DTO;

class CreateJobDTO
{
    public function __construct(
        public string $job_title_id,
        public ?string $position_description,
        public ?string $company_description,
        public ?array $skill_ids,
        public ?string $employee_description,
        public ?string $team_description,
        public ?array $interview,
        public string $salary_form,
        public string $salary_to,
        public string $pay,
        public array $category_ids,
        public ?string $type,
    ) {}

    public function toArray(): array
    {
        return [
            'job_title_id' => $this->job_title_id,
            'position_description' => $this->position_description,
            'company_description' => $this->company_description,
            'skill_ids' => $this->skill_ids,
            'employee_description' => $this->employee_description,
            'team_description' => $this->team_description,
            'interview' => $this->interview,
            'salary_form' => $this->salary_form,
            'salary_to' => $this->salary_to,
            'pay' => $this->pay,
            'category_ids' => $this->category_ids,
            'type' => $this->type,
        ];
    }
}

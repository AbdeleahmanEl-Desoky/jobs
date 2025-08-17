<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Job\Commands;

use Ramsey\Uuid\UuidInterface;

class UpdateJobCommand
{
    public function __construct(
        private UuidInterface $id,
        private ?string $job_title_id,
        private ?string $position_description,
        private ?string $company_description,
        private ?string $skill_ids,
        private ?string $employee_description,
        private ?string $team_description,
        private ?string $interview,
        private ?string $salary_form,
        private ?string $salary_to,
        private ?string $pay,
        private ?string $category_ids,
        private ?string $type,
    ) {}

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function toArray(): array
    {
        return array_filter([
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
        ], fn($value) => $value !== null);
    }
}

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
        // private ?array $skill_ids, // <<< REMOVE THIS
        private ?string $employee_description,
        private ?string $team_description,
        private ?array $interview,
        private ?string $salary_form,
        private ?string $salary_to,
        private ?string $pay,
        // private ?array $category_ids, // <<< REMOVE THIS
        private ?string $type,
        private ?array $skillIds,   // <<< ADD for relation handling
        private ?array $categoryIds, // <<< ADD for relation handling
        private ?string $status, // <<< ADD for relation handling
        private ?string $country_id,
        private ?string $city_id,
        private ?int $marke
    ) {}

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    // --- NEW: Getters for skillIds and categoryIds ---
    public function getSkillIds(): ?array
    {
        return $this->skillIds;
    }

    public function getCategoryIds(): ?array
    {
        return $this->categoryIds;
    }
    // --- END NEW ---

    public function toArray(): array
    {
        // This array should *only* contain data for the main EmployeeJob model columns.
        // Relationship data (skill_ids, category_ids) is processed separately.
        return array_filter([
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
            'status' => $this->status,
            'country_id' => $this->country_id,
            'city_id' => $this->city_id,
            'marke' => $this->marke,
        ], fn($value) => $value !== null);
    }
}

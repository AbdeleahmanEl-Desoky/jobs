<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Job\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\CoreCompany\Job\Commands\UpdateJobCommand;
use Illuminate\Validation\Rule; // Import Rule

class UpdateJobRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'job_title_id' => 'sometimes|required|uuid',
            'position_description' => 'sometimes|nullable|string',
            'company_description' => 'sometimes|nullable|string',
            'skill_ids' => ['sometimes', 'nullable', 'array'], // Use 'sometimes' for optional update
            'skill_ids.*' => ['uuid', Rule::exists('skills', 'id')], // Validate individual IDs
            'employee_description' => 'sometimes|nullable|string',
            'team_description' => 'sometimes|nullable|string',
            'interview' => 'sometimes|nullable|array',
            'salary_form' => 'sometimes|required|string',
            'salary_to' => 'sometimes|required|string',
            'pay' => 'sometimes|required|string',
            'category_ids' => ['sometimes', 'nullable', 'array'], // Use 'sometimes'
            'category_ids.*' => ['uuid', Rule::exists('categories', 'id')], // Validate individual IDs
            'type' => 'sometimes|required|string',
            'status' => 'sometimes|nullable|string', // Assuming status can be updated
            'country_id'=> 'sometimes|nullable',
            'city_id'=> 'sometimes|nullable',
            'marke' => 'sometimes|nullable',
        ];
    }

    public function createUpdateJobCommand(): UpdateJobCommand
    {
        return new UpdateJobCommand(
            id: Uuid::fromString($this->route('id')),
            job_title_id: $this->get('job_title_id'),
            position_description: $this->get('position_description'),
            company_description: $this->get('company_description'),
            // skill_ids: $this->get('skill_ids'), // <<< REMOVE THIS
            employee_description: $this->get('employee_description'),
            team_description: $this->get('team_description'),
            interview: $this->get('interview'),
            salary_form: $this->get('salary_form'),
            salary_to: $this->get('salary_to'),
            pay: $this->get('pay'),
            // category_ids: $this->get('category_ids'), // <<< REMOVE THIS
            type: $this->get('type'),
            skillIds: $this->get('skill_ids'),       // <<< PASS TO NEW COMMAND PROPERTY
            categoryIds: $this->get('category_ids'), // <<< PASS TO NEW COMMAND PROPERTY
            status: $this->get('status'),
            country_id: $this->get('country_id'),
            city_id: $this->get('city_id'),
            marke: $this->get('marke'),
        );
    }
}

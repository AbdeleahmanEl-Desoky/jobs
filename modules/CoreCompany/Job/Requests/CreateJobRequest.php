<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Job\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\CoreCompany\Job\DTO\CreateJobDTO;
use Illuminate\Validation\Rule; // Import Rule

class CreateJobRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'job_title_id' => 'required|uuid',
            'position_description' => 'nullable|string',
            'company_description' => 'nullable|string',
            'skill_ids' => ['nullable', 'array'], // Expect array of UUIDs
            'skill_ids.*' => ['uuid', Rule::exists('skills', 'id')], // Each ID must be a UUID and exist in skills table
            'employee_description' => 'nullable|string',
            'team_description' => 'nullable|string',
            'interview' => 'nullable|array',
            'salary_form' => 'required|string',
            'salary_to' => 'required|string',
            'pay' => 'required|string',
            'category_ids' => ['required', 'array'], // Expect array of UUIDs
            'category_ids.*' => ['uuid', Rule::exists('categories', 'id')], // Each ID must be a UUID and exist
            'type'=> 'required|string', // Ensure type is string
            'status' => 'nullable|string', // Assuming status can be set on create
            'country_id'=> 'required',
            'city_id'=> 'required',
        ];
    }

    public function createCreateJobDTO(): CreateJobDTO
    {
        return new CreateJobDTO(
            company_id : auth('api_company')->user()->id,
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
            skillIds: $this->get('skill_ids'),     // <<< PASS TO NEW DTO PROPERTY
            categoryIds: $this->get('category_ids'), // <<< PASS TO NEW DTO PROPERTY
            country_id: $this->get('country_id'),
            city_id: $this->get('city_id'),
        );
    }
}

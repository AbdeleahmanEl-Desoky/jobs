<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Job\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\CoreCompany\Job\DTO\CreateJobDTO;

class CreateJobRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'job_title_id' => 'required|uuid',
            'position_description' => 'nullable|string',
            'company_description' => 'nullable|string',
            'skill_ids' => 'nullable|array',
            'employee_description' => 'nullable|string',
            'team_description' => 'nullable|string',
            'interview' => 'nullable|array',
            'salary_form' => 'required|string',
            'salary_to' => 'required|string',
            'pay' => 'required|string',
            'category_ids' => 'required|array',
            'type'=> 'required'
        ];
    }

    public function createCreateJobDTO(): CreateJobDTO
    {
        return new CreateJobDTO(
            company_id : auth('api_company')->user()->id,
            job_title_id: $this->get('job_title_id'),
            position_description: $this->get('position_description'),
            company_description: $this->get('company_description'),
            skill_ids: $this->get('skill_ids'),
            employee_description: $this->get('employee_description'),
            team_description: $this->get('team_description'),
            interview: $this->get('interview'),
            salary_form: $this->get('salary_form'),
            salary_to: $this->get('salary_to'),
            pay: $this->get('pay'),
            category_ids: $this->get('category_ids'),
            type: $this->get('type')
        );
    }
}

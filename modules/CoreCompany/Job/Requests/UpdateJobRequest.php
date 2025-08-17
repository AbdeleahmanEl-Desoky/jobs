<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Job\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\CoreCompany\Job\Commands\UpdateJobCommand;

class UpdateJobRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'job_title_id' => 'sometimes|required|uuid',
            'position_description' => 'sometimes|nullable|string',
            'company_description' => 'sometimes|nullable|string',
            'skill_ids' => 'sometimes|nullable|json',
            'employee_description' => 'sometimes|nullable|string',
            'team_description' => 'sometimes|nullable|string',
            'interview' => 'sometimes|nullable|json',
            'salary_form' => 'sometimes|required|string',
            'salary_to' => 'sometimes|required|string',
            'pay' => 'sometimes|required|string',
            'category_ids' => 'sometimes|required|string',
            'type' => 'required'

        ];
    }

    public function createUpdateJobCommand(): UpdateJobCommand
    {
        return new UpdateJobCommand(
            id: Uuid::fromString($this->route('id')),
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

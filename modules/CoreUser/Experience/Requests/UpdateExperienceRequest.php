<?php

declare(strict_types=1);

namespace Modules\CoreUser\Experience\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\CoreUser\Experience\Commands\UpdateExperienceCommand;
use Modules\CoreUser\Experience\Handlers\UpdateExperienceHandler;

class UpdateExperienceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'position_title' => 'required|string',
            'company_name' => 'required|string',
            'company_field_id' => 'required|exists:fields,id',
            'company_size_id' => 'required|exists:company_sizes,id',
            'job_title_id' => 'required|exists:job_titles,id',
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'required|exists:cities,id',
            'field_id' => 'required|exists:fields,id',
            'date_from' => 'required|date',
            'date_to' => 'required|date|after_or_equal:date_from',
            'description' => 'nullable|string',
            'find_job' => 'required|boolean',
        ];
    }

    public function createUpdateExperienceCommand(): UpdateExperienceCommand
    {
        return new UpdateExperienceCommand(
            id: Uuid::fromString($this->route('id')),
            position_title: $this->get('position_title'),
            company_name: $this->get('company_name'),
            company_field_id: $this->get('company_field_id'),
            company_size_id: $this->get('company_size_id'),
            job_title_id: $this->get('job_title_id'),
            country_id: $this->get('country_id'),
            city_id: $this->get('city_id'),
            field_id: $this->get('field_id'),
            date_from: $this->get('date_from'),
            date_to: $this->get('date_to'),
            description: $this->get('description'),
            find_job: $this->get('find_job'),
        );
    }
}

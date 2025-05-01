<?php

declare(strict_types=1);

namespace Modules\CoreUser\Education\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\CoreUser\Education\DTO\CreateEducationDTO;

class CreateEducationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'degree_id' => 'required|uuid',
            'country_id' => 'required|',
            'city_id' => 'required|',
            'field_id' => 'required',
            'specialization_id' => 'required|uuid',
            'university_id' => 'required|uuid',
            'date_from' => 'required|date',
            'date_to' => 'required|date|after_or_equal:date_from',
            'graduation_grade_type' => 'required|in:GPA,percentage',
            'graduation_grade_value' => 'required|integer',
            'description' => 'nullable|string',
        ];
    }

    public function createCreateEducationDTO(): CreateEducationDTO
    {
        return new CreateEducationDTO(
            user_id: Uuid::fromString(auth('api_user')->user()->id),
            degree_id: $this->get('degree_id'),
            country_id: $this->get('country_id'),
            city_id: $this->get('city_id'),
            field_id: $this->get('field_id'),
            specialization_id: $this->get('specialization_id'),
            university_id: $this->get('university_id'),
            date_from: $this->get('date_from'),
            date_to: $this->get('date_to'),
            graduation_grade_type: $this->get('graduation_grade_type'),
            graduation_grade_value: $this->get('graduation_grade_value'),
            description: $this->get('description'),
        );
    }
}

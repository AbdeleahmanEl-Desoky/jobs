<?php

declare(strict_types=1);

namespace Modules\CoreUser\User\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\CoreUser\User\Commands\UpdateUserCommand;
use Modules\CoreUser\User\Handlers\UpdateUserHandler;

class UpdateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'phonecode' => 'required|string',
            'country_id' => 'required|string',
            'city_id' => 'required|string',
            'postal_code' => 'required|string',
            'minimum_salary_amount' => 'required|string',
            'payment_period' => 'required|string',
            'about' => 'required|string',
            'status_employment_id' => 'required|string',
            'job_title_id' => 'required|string',
            'file' => 'nullable|image',
        ];
    }

    public function createUpdateUserCommand(): UpdateUserCommand
    {
        return new UpdateUserCommand(
            id: Uuid::fromString(auth('api_user')->user()->id),
            name: $this->get('name'),
            lastName: $this->get('last_name'),
            email: $this->get('email'),
            phone: $this->get('phone'),
            phonecode: $this->get('phonecode'),
            countryId: (int) $this->get('country_id'),
            cityId: (int) $this->get('city_id'),
            postalCode: $this->get('postal_code'),
            minimumSalaryAmount: (int) $this->get('minimum_salary_amount'),
            paymentPeriod: $this->get('payment_period'),
            about: $this->get('about'),
            statusEmploymentId: $this->get('status_employment_id'),
            jobTitleId: $this->get('job_title_id'),
            file: $this->file('file'),
        );
    }
}

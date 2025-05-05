<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Company\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\CoreCompany\Company\Commands\UpdateCompanyCommand;
use Modules\CoreCompany\Company\Handlers\UpdateCompanyHandler;

class UpdateCompanyRequest extends FormRequest
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
            'city_id'=> 'required|string',
            'postal_code'=> 'required|string',
            'minimum_salary_amount'=> 'nullable',
            'payment_period'=> 'nullable',
            'about'=> 'required|string',
            'field_id' => 'required|string',
            'company_size_id'=> 'required|string',
            'file' => 'nullable|image',
        ];
    }

    public function createUpdateCompanyCommand(): UpdateCompanyCommand
    {
        return new UpdateCompanyCommand(
            id: Uuid::fromString(auth('api_company')->user()->id),
            name: $this->get('name'),
            lastName: $this->get('last_name'),
            email: $this->get('email'),
            phone: $this->get('phone'),
            phonecode: $this->get('phonecode'),
            countryId: $this->get('country_id'),
            cityId: $this->get('city_id'),
            postalCode: $this->get('postal_code'),
            minimumSalaryAmount: $this->get('minimum_salary_amount'),
            paymentPeriod: $this->get('payment_period'),
            about: $this->get('about'),
            fieldId: $this->get('field_id'),
            companySizeId: $this->get('company_size_id'),
            file: $this->file('file'),
        );
    }
}

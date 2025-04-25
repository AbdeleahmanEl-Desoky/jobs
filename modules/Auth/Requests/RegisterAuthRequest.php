<?php

declare(strict_types=1);

namespace Modules\Auth\Requests;

use App\Rules\UniqueEmailOrPhone;
use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\Auth\DTO\CreateAuthDTO;

class RegisterAuthRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => ['required', 'email', new UniqueEmailOrPhone('email')],
            'phone' => ['required', new UniqueEmailOrPhone('phone')],
            'password' => 'required',
            'type'     => 'required|in:user,company',

            'last_name' => 'required|string',
            'phonecode'  => "required|exists:countries,phonecode",
            'country_id' => "required|exists:countries,id",
            'city_id'    => "required|exists:cities,id",
            'postal_code' => "required|string",
            'minimum_salary_amount' => "required",
            'Payment_period' => "required",
            'about' => "required|string",
            'field_id' => "required_if:type,company|exists:fields,id",
            'company_size_id'=> "required_if:type,company|exists:company_sizes,id",
        ];
    }

    public function createCreateAuthDTO(): CreateAuthDTO
    {
        return new CreateAuthDTO(
            name: $this->get('name'),
            email: $this->get('email'),
            password: $this->get('password'),
            type: $this->get('type'),
            phone: $this->get( 'phone'),
            last_name:$this->get('last_name'),
            phonecode:$this->get('phonecode'),
            country_id:$this->get('country_id'),
            city_id:$this->get('city_id'),
            postal_code:$this->get('postal_code'),
            minimum_salary_amount:$this->get('minimum_salary_amount'),
            Payment_period:$this->get('Payment_period'),
            about:$this->get('about'),
            field_id:$this->get('field_id'),
            company_size_id:$this->get('company_size_id'),
        );
    }
}

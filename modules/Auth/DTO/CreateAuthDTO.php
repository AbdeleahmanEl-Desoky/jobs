<?php

declare(strict_types=1);

namespace Modules\Auth\DTO;

use Ramsey\Uuid\UuidInterface;

class CreateAuthDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public string $type,
        public string $phone,
        public string $last_name,
        public string $phonecode,
        public string $country_id,
        public string $city_id,
        public string $postal_code,
        public string $minimum_salary_amount,
        public string $Payment_period,
        public string $about,
        public ?string $field_id = null,
        public ?string $company_size_id = null,
    ) {
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'type' => $this->type,
            'phone' => $this->phone,

            'last_name'=>$this->last_name,
            'phonecode'=>$this->phonecode,
            'country_id'=>$this->country_id,
            'city_id'=>$this->city_id,
            'postal_code'=>$this->postal_code,
            'minimum_salary_amount'=>$this->minimum_salary_amount,
            'Payment_period'=>$this->Payment_period,
            'about'=>$this->about,
            'field_id'=>$this->field_id,
            'company_size_id'=>$this->company_size_id,
        ];
    }
}

<?php

declare(strict_types=1);

namespace Modules\Shared\CompanySize\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\Shared\CompanySize\DTO\CreateCompanySizeDTO;

class CreateCompanySizeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
        ];
    }

    public function createCreateCompanySizeDTO(): CreateCompanySizeDTO
    {
        return new CreateCompanySizeDTO(
            name: $this->get('name'),
        );
    }
}

<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Company\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\CoreCompany\Company\DTO\CreateCompanyDTO;

class CreateCompanyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
        ];
    }

    public function createCreateCompanyDTO(): CreateCompanyDTO
    {
        return new CreateCompanyDTO(
            name: $this->get('name'),
        );
    }
}

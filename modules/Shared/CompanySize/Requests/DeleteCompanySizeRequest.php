<?php

declare(strict_types=1);

namespace Modules\Shared\CompanySize\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;

class DeleteCompanySizeRequest extends FormRequest
{
    public function rules(): array
    {
        return [];
    }
}

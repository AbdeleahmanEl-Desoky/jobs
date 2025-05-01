<?php

declare(strict_types=1);

namespace Modules\Shared\Specialization\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;

class GetSpecializationRequest extends FormRequest
{
    public function rules(): array
    {
        return [];
    }
}

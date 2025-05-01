<?php

declare(strict_types=1);

namespace Modules\CoreUser\Education\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;

class GetEducationRequest extends FormRequest
{
    public function rules(): array
    {
        return [];
    }
}

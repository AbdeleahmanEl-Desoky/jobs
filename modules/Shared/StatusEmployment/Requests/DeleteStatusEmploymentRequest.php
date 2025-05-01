<?php

declare(strict_types=1);

namespace Modules\Shared\StatusEmployment\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;

class DeleteStatusEmploymentRequest extends FormRequest
{
    public function rules(): array
    {
        return [];
    }
}

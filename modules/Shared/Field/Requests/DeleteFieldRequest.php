<?php

declare(strict_types=1);

namespace Modules\Shared\Field\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;

class DeleteFieldRequest extends FormRequest
{
    public function rules(): array
    {
        return [];
    }
}

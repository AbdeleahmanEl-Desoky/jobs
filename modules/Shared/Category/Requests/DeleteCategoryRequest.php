<?php

declare(strict_types=1);

namespace Modules\Shared\Category\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;

class DeleteCategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [];
    }
}

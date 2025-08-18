<?php

declare(strict_types=1);

namespace Modules\CoreUser\Saved\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;

class DeleteSavedRequest extends FormRequest
{
    public function rules(): array
    {
        return [];
    }
}

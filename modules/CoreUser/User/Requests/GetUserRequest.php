<?php

declare(strict_types=1);

namespace Modules\CoreUser\User\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;

class GetUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [];
    }
}

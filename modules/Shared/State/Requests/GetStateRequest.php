<?php

declare(strict_types=1);

namespace Modules\Shared\State\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;

class GetStateRequest extends FormRequest
{
    public function rules(): array
    {
        return [];
    }
}

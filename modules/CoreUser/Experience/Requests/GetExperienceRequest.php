<?php

declare(strict_types=1);

namespace Modules\CoreUser\Experience\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;

class GetExperienceRequest extends FormRequest
{
    public function rules(): array
    {
        return [];
    }
}

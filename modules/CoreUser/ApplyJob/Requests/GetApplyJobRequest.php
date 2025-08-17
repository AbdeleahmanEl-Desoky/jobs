<?php

declare(strict_types=1);

namespace Modules\CoreUser\ApplyJob\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;

class GetApplyJobRequest extends FormRequest
{
    public function rules(): array
    {
        return [];
    }
}

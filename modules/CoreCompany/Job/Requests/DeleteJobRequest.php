<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Job\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;

class DeleteJobRequest extends FormRequest
{
    public function rules(): array
    {
        return [];
    }
}

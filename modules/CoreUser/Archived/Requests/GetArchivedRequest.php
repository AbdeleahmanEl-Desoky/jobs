<?php

declare(strict_types=1);

namespace Modules\CoreUser\Archived\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;

class GetArchivedRequest extends FormRequest
{
    public function rules(): array
    {
        return [];
    }
}

<?php

declare(strict_types=1);

namespace Modules\CoreUser\Skill\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;

class GetSkillRequest extends FormRequest
{
    public function rules(): array
    {
        return [];
    }
}

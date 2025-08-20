<?php

declare(strict_types=1);

namespace Modules\Shared\Skill\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;

class DeleteSkillRequest extends FormRequest
{
    public function rules(): array
    {
        return [];
    }
}

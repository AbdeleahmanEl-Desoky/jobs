<?php

declare(strict_types=1);

namespace Modules\CoreUser\UserSkill\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\CoreUser\UserSkill\DTO\CreateSkillDTO;

class CreateSkillRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'description' => 'nullable|string',
        ];
    }

    public function createCreateSkillDTO(): CreateSkillDTO
    {
        return new CreateSkillDTO(
            name: $this->get('name'),
            description: $this->get('description')
        );
    }
}

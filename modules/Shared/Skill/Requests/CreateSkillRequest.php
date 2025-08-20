<?php

declare(strict_types=1);

namespace Modules\Shared\Skill\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\Shared\Skill\DTO\CreateSkillDTO;

class CreateSkillRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
        ];
    }

    public function createCreateSkillDTO(): CreateSkillDTO
    {
        return new CreateSkillDTO(
            name: $this->get('name'),
        );
    }
}

<?php

declare(strict_types=1);

namespace Modules\CoreUser\UserSkill\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\CoreUser\UserSkill\Commands\UpdateSkillCommand;
use Modules\CoreUser\UserSkill\Handlers\UpdateSkillHandler;

class UpdateSkillRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'nullable|string',
            'description' => 'nullable|string',
            'skill_id' => 'nullable|uuid',
        ];
    }

    public function createUpdateSkillCommand(): UpdateSkillCommand
    {
        return new UpdateSkillCommand(
            id: Uuid::fromString($this->route('id')),
            user_id: Uuid::fromString(auth('api_user')->user()->id),
            name: $this->get('name'),
            description: $this->get('description'),
            skill_id: Uuid::fromString($this->get('skill_id')),
        );
    }
}

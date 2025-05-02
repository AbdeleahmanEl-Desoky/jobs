<?php

declare(strict_types=1);

namespace Modules\CoreUser\Skill\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\CoreUser\Skill\Commands\UpdateSkillCommand;
use Modules\CoreUser\Skill\Handlers\UpdateSkillHandler;

class UpdateSkillRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'description' => 'nullable|string',
        ];
    }

    public function createUpdateSkillCommand(): UpdateSkillCommand
    {
        return new UpdateSkillCommand(
            id: Uuid::fromString($this->route('id')),
            name: $this->get('name'),
            description: $this->get('description')
        );
    }
}

<?php

declare(strict_types=1);

namespace Modules\Shared\Skill\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\Shared\Skill\Commands\UpdateSkillCommand;
use Modules\Shared\Skill\Handlers\UpdateSkillHandler;

class UpdateSkillRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
        ];
    }

    public function createUpdateSkillCommand(): UpdateSkillCommand
    {
        return new UpdateSkillCommand(
            id: Uuid::fromString($this->route('id')),
            name: $this->get('name'),
        );
    }
}

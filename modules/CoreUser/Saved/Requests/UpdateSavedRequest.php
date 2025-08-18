<?php

declare(strict_types=1);

namespace Modules\CoreUser\Saved\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\CoreUser\Saved\Commands\UpdateSavedCommand;
use Modules\CoreUser\Saved\Handlers\UpdateSavedHandler;

class UpdateSavedRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
        ];
    }

    public function createUpdateSavedCommand(): UpdateSavedCommand
    {
        return new UpdateSavedCommand(
            id: Uuid::fromString($this->route('id')),
            name: $this->get('name'),
        );
    }
}

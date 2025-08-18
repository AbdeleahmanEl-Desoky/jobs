<?php

declare(strict_types=1);

namespace Modules\CoreUser\Archived\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\CoreUser\Archived\Commands\UpdateArchivedCommand;
use Modules\CoreUser\Archived\Handlers\UpdateArchivedHandler;

class UpdateArchivedRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
        ];
    }

    public function createUpdateArchivedCommand(): UpdateArchivedCommand
    {
        return new UpdateArchivedCommand(
            id: Uuid::fromString($this->route('id')),
            name: $this->get('name'),
        );
    }
}

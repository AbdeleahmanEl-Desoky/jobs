<?php

declare(strict_types=1);

namespace Modules\Shared\CompanySize\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;
use Modules\Shared\CompanySize\Commands\UpdateCompanySizeCommand;
use Modules\Shared\CompanySize\Handlers\UpdateCompanySizeHandler;

class UpdateCompanySizeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
        ];
    }

    public function createUpdateCompanySizeCommand(): UpdateCompanySizeCommand
    {
        return new UpdateCompanySizeCommand(
            id: Uuid::fromString($this->route('id')),
            name: $this->get('name'),
        );
    }
}

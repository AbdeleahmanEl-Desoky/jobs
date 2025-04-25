<?php

declare(strict_types=1);

namespace Modules\Shared\Field\Presenters;

use Modules\Shared\Field\Models\Field;
use BasePackage\Shared\Presenters\AbstractPresenter;

class FieldPresenter extends AbstractPresenter
{
    private Field $field;

    public function __construct(Field $field)
    {
        $this->field = $field;
    }

    protected function present(bool $isListing = false): array
    {
        return [
            'id' => $this->field->id,
            'name' => $this->field->name,
        ];
    }
}

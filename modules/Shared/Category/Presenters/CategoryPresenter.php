<?php

declare(strict_types=1);

namespace Modules\Shared\Category\Presenters;

use Modules\Shared\Category\Models\Category;
use BasePackage\Shared\Presenters\AbstractPresenter;

class CategoryPresenter extends AbstractPresenter
{
    private Category $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    protected function present(bool $isListing = false): array
    {
        return [
            'id' => $this->category->id,
            'name' => $this->category->name,
        ];
    }
}

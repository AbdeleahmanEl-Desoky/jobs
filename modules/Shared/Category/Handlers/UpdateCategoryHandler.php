<?php

declare(strict_types=1);

namespace Modules\Shared\Category\Handlers;

use Modules\Shared\Category\Commands\UpdateCategoryCommand;
use Modules\Shared\Category\Repositories\CategoryRepository;

class UpdateCategoryHandler
{
    public function __construct(
        private CategoryRepository $repository,
    ) {
    }

    public function handle(UpdateCategoryCommand $updateCategoryCommand)
    {
        $this->repository->updateCategory($updateCategoryCommand->getId(), $updateCategoryCommand->toArray());
    }
}

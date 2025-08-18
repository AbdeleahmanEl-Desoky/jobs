<?php

declare(strict_types=1);

namespace Modules\CoreUser\Saved\Services;

use Illuminate\Support\Collection;
use Modules\CoreUser\Saved\DTO\CreateSavedDTO;
use Modules\CoreUser\Saved\Models\Saved;
use Modules\CoreUser\Saved\Repositories\SavedRepository;
use Ramsey\Uuid\UuidInterface;

class SavedCRUDService
{
    public function __construct(
        private SavedRepository $repository,
    ) {
    }

    public function create(CreateSavedDTO $createSavedDTO): Saved
    {
         return $this->repository->createSaved($createSavedDTO->toArray());
    }

    public function list(int $page = 1, int $perPage = 10): array
    {
        return $this->repository->paginated(
            page: $page,
            perPage: $perPage,
        );
    }

    public function get(UuidInterface $id): Saved
    {
        return $this->repository->getSaved(
            id: $id,
        );
    }
}

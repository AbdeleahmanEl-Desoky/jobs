<?php

declare(strict_types=1);

namespace Modules\CoreUser\Archived\Services;

use Illuminate\Support\Collection;
use Modules\CoreUser\Archived\DTO\CreateArchivedDTO;
use Modules\CoreUser\Archived\Models\Archived;
use Modules\CoreUser\Archived\Repositories\ArchivedRepository;
use Ramsey\Uuid\UuidInterface;

class ArchivedCRUDService
{
    public function __construct(
        private ArchivedRepository $repository,
    ) {
    }

    public function create(CreateArchivedDTO $createArchivedDTO): Archived
    {
         return $this->repository->createArchived($createArchivedDTO->toArray());
    }

    public function list(int $page = 1, int $perPage = 10): array
    {
        return $this->repository->paginated(
            page: $page,
            perPage: $perPage,
        );
    }

    public function get(UuidInterface $id): Archived
    {
        return $this->repository->getArchived(
            id: $id,
        );
    }
}

<?php

declare(strict_types=1);

namespace Modules\Shared\Field\Services;

use Illuminate\Support\Collection;
use Modules\Shared\Field\DTO\CreateFieldDTO;
use Modules\Shared\Field\Models\Field;
use Modules\Shared\Field\Repositories\FieldRepository;
use Ramsey\Uuid\UuidInterface;

class FieldCRUDService
{
    public function __construct(
        private FieldRepository $repository,
    ) {
    }

    public function create(CreateFieldDTO $createFieldDTO): Field
    {
         return $this->repository->createField($createFieldDTO->toArray());
    }

    public function list(int $page = 1, int $perPage = 10): array
    {
        return $this->repository->paginated(
            page: $page,
            perPage: $perPage,
        );
    }

    public function get(UuidInterface $id): Field
    {
        return $this->repository->getField(
            id: $id,
        );
    }
}

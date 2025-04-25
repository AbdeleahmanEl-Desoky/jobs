<?php

declare(strict_types=1);

namespace Modules\Shared\Field\Controllers;

use App\Presenters\Json;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Shared\Field\Handlers\DeleteFieldHandler;
use Modules\Shared\Field\Handlers\UpdateFieldHandler;
use Modules\Shared\Field\Presenters\FieldPresenter;
use Modules\Shared\Field\Requests\CreateFieldRequest;
use Modules\Shared\Field\Requests\DeleteFieldRequest;
use Modules\Shared\Field\Requests\GetFieldListRequest;
use Modules\Shared\Field\Requests\GetFieldRequest;
use Modules\Shared\Field\Requests\UpdateFieldRequest;
use Modules\Shared\Field\Services\FieldCRUDService;
use Ramsey\Uuid\Uuid;

class FieldController extends Controller
{
    public function __construct(
        private FieldCRUDService $fieldService,
        private UpdateFieldHandler $updateFieldHandler,
        private DeleteFieldHandler $deleteFieldHandler,
    ) {
    }

    public function index(GetFieldListRequest $request): JsonResponse
    {
        $list = $this->fieldService->list(
            (int) $request->get('page', 1),
            (int) $request->get('per_page', 10)
        );

        return Json::items(FieldPresenter::collection($list['data']), paginationSettings: $list['pagination']);
    }

    public function show(GetFieldRequest $request): JsonResponse
    {
        $item = $this->fieldService->get(Uuid::fromString($request->route('id')));

        $presenter = new FieldPresenter($item);

        return Json::item($presenter->getData());
    }

    public function store(CreateFieldRequest $request): JsonResponse
    {
        $createdItem = $this->fieldService->create($request->createCreateFieldDTO());

        $presenter = new FieldPresenter($createdItem);

        return Json::item($presenter->getData());
    }

    public function update(UpdateFieldRequest $request): JsonResponse
    {
        $command = $request->createUpdateFieldCommand();
        $this->updateFieldHandler->handle($command);

        $item = $this->fieldService->get($command->getId());

        $presenter = new FieldPresenter($item);

        return Json::item( $presenter->getData());
    }

    public function delete(DeleteFieldRequest $request): JsonResponse
    {
        $this->deleteFieldHandler->handle(Uuid::fromString($request->route('id')));

        return Json::deleted();
    }
}

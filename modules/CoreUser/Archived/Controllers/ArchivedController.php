<?php

declare(strict_types=1);

namespace Modules\CoreUser\Archived\Controllers;

use App\Presenters\Json;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\CoreUser\Archived\Handlers\DeleteArchivedHandler;
use Modules\CoreUser\Archived\Handlers\UpdateArchivedHandler;
use Modules\CoreUser\Archived\Presenters\ArchivedPresenter;
use Modules\CoreUser\Archived\Requests\CreateArchivedRequest;
use Modules\CoreUser\Archived\Requests\DeleteArchivedRequest;
use Modules\CoreUser\Archived\Requests\GetArchivedListRequest;
use Modules\CoreUser\Archived\Requests\GetArchivedRequest;
use Modules\CoreUser\Archived\Requests\UpdateArchivedRequest;
use Modules\CoreUser\Archived\Services\ArchivedCRUDService;
use Ramsey\Uuid\Uuid;

class ArchivedController extends Controller
{
    public function __construct(
        private ArchivedCRUDService $archivedService,
        private UpdateArchivedHandler $updateArchivedHandler,
        private DeleteArchivedHandler $deleteArchivedHandler,
    ) {
    }

    public function index(GetArchivedListRequest $request): JsonResponse
    {
        $list = $this->archivedService->list(
            (int) $request->get('page', 1),
            (int) $request->get('per_page', 10)
        );

        return Json::items(ArchivedPresenter::collection($list['data']), paginationSettings: $list['pagination']);
    }

    public function show(GetArchivedRequest $request): JsonResponse
    {
        $item = $this->archivedService->get(Uuid::fromString($request->route('id')));

        $presenter = new ArchivedPresenter($item);

        return Json::item($presenter->getData());
    }

    public function store(CreateArchivedRequest $request): JsonResponse
    {
        $createdItem = $this->archivedService->create($request->createCreateArchivedDTO());

        $presenter = new ArchivedPresenter($createdItem);

        return Json::item($presenter->getData());
    }

    public function update(UpdateArchivedRequest $request): JsonResponse
    {
        $command = $request->createUpdateArchivedCommand();
        $this->updateArchivedHandler->handle($command);

        $item = $this->archivedService->get($command->getId());

        $presenter = new ArchivedPresenter($item);

        return Json::item( $presenter->getData());
    }

    public function delete(DeleteArchivedRequest $request): JsonResponse
    {
        $this->deleteArchivedHandler->handle(Uuid::fromString($request->route('id')));

        return Json::deleted();
    }
}

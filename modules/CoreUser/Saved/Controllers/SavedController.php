<?php

declare(strict_types=1);

namespace Modules\CoreUser\Saved\Controllers;

use App\Presenters\Json;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\CoreUser\Saved\Handlers\DeleteSavedHandler;
use Modules\CoreUser\Saved\Handlers\UpdateSavedHandler;
use Modules\CoreUser\Saved\Presenters\SavedPresenter;
use Modules\CoreUser\Saved\Requests\CreateSavedRequest;
use Modules\CoreUser\Saved\Requests\DeleteSavedRequest;
use Modules\CoreUser\Saved\Requests\GetSavedListRequest;
use Modules\CoreUser\Saved\Requests\GetSavedRequest;
use Modules\CoreUser\Saved\Requests\UpdateSavedRequest;
use Modules\CoreUser\Saved\Services\SavedCRUDService;
use Ramsey\Uuid\Uuid;

class SavedController extends Controller
{
    public function __construct(
        private SavedCRUDService $savedService,
        private UpdateSavedHandler $updateSavedHandler,
        private DeleteSavedHandler $deleteSavedHandler,
    ) {
    }

    public function index(GetSavedListRequest $request): JsonResponse
    {
        $list = $this->savedService->list(
            (int) $request->get('page', 1),
            (int) $request->get('per_page', 10)
        );

        return Json::items(SavedPresenter::collection($list['data']), paginationSettings: $list['pagination']);
    }

    public function show(GetSavedRequest $request): JsonResponse
    {
        $item = $this->savedService->get(Uuid::fromString($request->route('id')));

        $presenter = new SavedPresenter($item);

        return Json::item($presenter->getData());
    }

    public function store(CreateSavedRequest $request): JsonResponse
    {
        $createdItem = $this->savedService->create($request->createCreateSavedDTO());

        $presenter = new SavedPresenter($createdItem);

        return Json::item($presenter->getData());
    }

    public function update(UpdateSavedRequest $request): JsonResponse
    {
        $command = $request->createUpdateSavedCommand();
        $this->updateSavedHandler->handle($command);

        $item = $this->savedService->get($command->getId());

        $presenter = new SavedPresenter($item);

        return Json::item( $presenter->getData());
    }

    public function delete(DeleteSavedRequest $request): JsonResponse
    {
        $this->deleteSavedHandler->handle(Uuid::fromString($request->route('id')));

        return Json::deleted();
    }
}

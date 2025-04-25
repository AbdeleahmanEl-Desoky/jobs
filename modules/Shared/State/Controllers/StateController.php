<?php

declare(strict_types=1);

namespace Modules\Shared\State\Controllers;

use App\Presenters\Json;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Shared\State\Handlers\DeleteStateHandler;
use Modules\Shared\State\Handlers\UpdateStateHandler;
use Modules\Shared\State\Presenters\StatePresenter;
use Modules\Shared\State\Requests\CreateStateRequest;
use Modules\Shared\State\Requests\DeleteStateRequest;
use Modules\Shared\State\Requests\GetStateListRequest;
use Modules\Shared\State\Requests\GetStateRequest;
use Modules\Shared\State\Requests\UpdateStateRequest;
use Modules\Shared\State\Services\StateCRUDService;
use Ramsey\Uuid\Uuid;

class StateController extends Controller
{
    public function __construct(
        private StateCRUDService $stateService,
        private UpdateStateHandler $updateStateHandler,
        private DeleteStateHandler $deleteStateHandler,
    ) {
    }

    public function index(GetStateListRequest $request): JsonResponse
    {
        $list = $this->stateService->list(
            (int) $request->get('page', 1),
            (int) $request->get('per_page', 10)
        );

        return Json::items(StatePresenter::collection($list['data']), paginationSettings: $list['pagination']);
    }

    public function show(GetStateRequest $request): JsonResponse
    {
        $item = $this->stateService->get(Uuid::fromString($request->route('id')));

        $presenter = new StatePresenter($item);

        return Json::item($presenter->getData());
    }

    public function store(CreateStateRequest $request): JsonResponse
    {
        $createdItem = $this->stateService->create($request->createCreateStateDTO());

        $presenter = new StatePresenter($createdItem);

        return Json::item($presenter->getData());
    }

    public function update(UpdateStateRequest $request): JsonResponse
    {
        $command = $request->createUpdateStateCommand();
        $this->updateStateHandler->handle($command);

        $item = $this->stateService->get($command->getId());

        $presenter = new StatePresenter($item);

        return Json::item( $presenter->getData());
    }

    public function delete(DeleteStateRequest $request): JsonResponse
    {
        $this->deleteStateHandler->handle(Uuid::fromString($request->route('id')));

        return Json::deleted();
    }
}

<?php

declare(strict_types=1);

namespace Modules\Shared\Degree\Controllers;

use App\Presenters\Json;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Shared\Degree\Handlers\DeleteDegreeHandler;
use Modules\Shared\Degree\Handlers\UpdateDegreeHandler;
use Modules\Shared\Degree\Presenters\DegreePresenter;
use Modules\Shared\Degree\Requests\CreateDegreeRequest;
use Modules\Shared\Degree\Requests\DeleteDegreeRequest;
use Modules\Shared\Degree\Requests\GetDegreeListRequest;
use Modules\Shared\Degree\Requests\GetDegreeRequest;
use Modules\Shared\Degree\Requests\UpdateDegreeRequest;
use Modules\Shared\Degree\Services\DegreeCRUDService;
use Ramsey\Uuid\Uuid;

class DegreeController extends Controller
{
    public function __construct(
        private DegreeCRUDService $degreeService,
        private UpdateDegreeHandler $updateDegreeHandler,
        private DeleteDegreeHandler $deleteDegreeHandler,
    ) {
    }

    public function index(GetDegreeListRequest $request): JsonResponse
    {
        $list = $this->degreeService->list(
            (int) $request->get('page', 1),
            (int) $request->get('per_page', 10)
        );

        return Json::items(DegreePresenter::collection($list['data']), paginationSettings: $list['pagination']);
    }

    public function show(GetDegreeRequest $request): JsonResponse
    {
        $item = $this->degreeService->get(Uuid::fromString($request->route('id')));

        $presenter = new DegreePresenter($item);

        return Json::item($presenter->getData());
    }

    public function store(CreateDegreeRequest $request): JsonResponse
    {
        $createdItem = $this->degreeService->create($request->createCreateDegreeDTO());

        $presenter = new DegreePresenter($createdItem);

        return Json::item($presenter->getData());
    }

    public function update(UpdateDegreeRequest $request): JsonResponse
    {
        $command = $request->createUpdateDegreeCommand();
        $this->updateDegreeHandler->handle($command);

        $item = $this->degreeService->get($command->getId());

        $presenter = new DegreePresenter($item);

        return Json::item( $presenter->getData());
    }

    public function delete(DeleteDegreeRequest $request): JsonResponse
    {
        $this->deleteDegreeHandler->handle(Uuid::fromString($request->route('id')));

        return Json::deleted();
    }
}

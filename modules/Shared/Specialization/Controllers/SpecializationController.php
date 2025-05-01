<?php

declare(strict_types=1);

namespace Modules\Shared\Specialization\Controllers;

use App\Presenters\Json;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Shared\Specialization\Handlers\DeleteSpecializationHandler;
use Modules\Shared\Specialization\Handlers\UpdateSpecializationHandler;
use Modules\Shared\Specialization\Presenters\SpecializationPresenter;
use Modules\Shared\Specialization\Requests\CreateSpecializationRequest;
use Modules\Shared\Specialization\Requests\DeleteSpecializationRequest;
use Modules\Shared\Specialization\Requests\GetSpecializationListRequest;
use Modules\Shared\Specialization\Requests\GetSpecializationRequest;
use Modules\Shared\Specialization\Requests\UpdateSpecializationRequest;
use Modules\Shared\Specialization\Services\SpecializationCRUDService;
use Ramsey\Uuid\Uuid;

class SpecializationController extends Controller
{
    public function __construct(
        private SpecializationCRUDService $specializationService,
        private UpdateSpecializationHandler $updateSpecializationHandler,
        private DeleteSpecializationHandler $deleteSpecializationHandler,
    ) {
    }

    public function index(GetSpecializationListRequest $request): JsonResponse
    {
        $list = $this->specializationService->list(
            (int) $request->get('page', 1),
            (int) $request->get('per_page', 10)
        );

        return Json::items(SpecializationPresenter::collection($list['data']), paginationSettings: $list['pagination']);
    }

    public function show(GetSpecializationRequest $request): JsonResponse
    {
        $item = $this->specializationService->get(Uuid::fromString($request->route('id')));

        $presenter = new SpecializationPresenter($item);

        return Json::item($presenter->getData());
    }

    public function store(CreateSpecializationRequest $request): JsonResponse
    {
        $createdItem = $this->specializationService->create($request->createCreateSpecializationDTO());

        $presenter = new SpecializationPresenter($createdItem);

        return Json::item($presenter->getData());
    }

    public function update(UpdateSpecializationRequest $request): JsonResponse
    {
        $command = $request->createUpdateSpecializationCommand();
        $this->updateSpecializationHandler->handle($command);

        $item = $this->specializationService->get($command->getId());

        $presenter = new SpecializationPresenter($item);

        return Json::item( $presenter->getData());
    }

    public function delete(DeleteSpecializationRequest $request): JsonResponse
    {
        $this->deleteSpecializationHandler->handle(Uuid::fromString($request->route('id')));

        return Json::deleted();
    }
}

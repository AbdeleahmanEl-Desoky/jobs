<?php

declare(strict_types=1);

namespace Modules\Shared\StatusEmployment\Controllers;

use App\Presenters\Json;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Shared\StatusEmployment\Handlers\DeleteStatusEmploymentHandler;
use Modules\Shared\StatusEmployment\Handlers\UpdateStatusEmploymentHandler;
use Modules\Shared\StatusEmployment\Presenters\StatusEmploymentPresenter;
use Modules\Shared\StatusEmployment\Requests\CreateStatusEmploymentRequest;
use Modules\Shared\StatusEmployment\Requests\DeleteStatusEmploymentRequest;
use Modules\Shared\StatusEmployment\Requests\GetStatusEmploymentListRequest;
use Modules\Shared\StatusEmployment\Requests\GetStatusEmploymentRequest;
use Modules\Shared\StatusEmployment\Requests\UpdateStatusEmploymentRequest;
use Modules\Shared\StatusEmployment\Services\StatusEmploymentCRUDService;
use Ramsey\Uuid\Uuid;

class StatusEmploymentController extends Controller
{
    public function __construct(
        private StatusEmploymentCRUDService $statusEmploymentService,
        private UpdateStatusEmploymentHandler $updateStatusEmploymentHandler,
        private DeleteStatusEmploymentHandler $deleteStatusEmploymentHandler,
    ) {
    }

    public function index(GetStatusEmploymentListRequest $request): JsonResponse
    {
        $list = $this->statusEmploymentService->list(
            (int) $request->get('page', 1),
            (int) $request->get('per_page', 10)
        );

        return Json::items(StatusEmploymentPresenter::collection($list['data']), paginationSettings: $list['pagination']);
    }

    public function show(GetStatusEmploymentRequest $request): JsonResponse
    {
        $item = $this->statusEmploymentService->get(Uuid::fromString($request->route('id')));

        $presenter = new StatusEmploymentPresenter($item);

        return Json::item($presenter->getData());
    }

    public function store(CreateStatusEmploymentRequest $request): JsonResponse
    {
        $createdItem = $this->statusEmploymentService->create($request->createCreateStatusEmploymentDTO());

        $presenter = new StatusEmploymentPresenter($createdItem);

        return Json::item($presenter->getData());
    }

    public function update(UpdateStatusEmploymentRequest $request): JsonResponse
    {
        $command = $request->createUpdateStatusEmploymentCommand();
        $this->updateStatusEmploymentHandler->handle($command);

        $item = $this->statusEmploymentService->get($command->getId());

        $presenter = new StatusEmploymentPresenter($item);

        return Json::item( $presenter->getData());
    }

    public function delete(DeleteStatusEmploymentRequest $request): JsonResponse
    {
        $this->deleteStatusEmploymentHandler->handle(Uuid::fromString($request->route('id')));

        return Json::deleted();
    }
}

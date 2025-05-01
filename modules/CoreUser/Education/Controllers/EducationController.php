<?php

declare(strict_types=1);

namespace Modules\CoreUser\Education\Controllers;

use App\Presenters\Json;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\CoreUser\Education\Handlers\DeleteEducationHandler;
use Modules\CoreUser\Education\Handlers\UpdateEducationHandler;
use Modules\CoreUser\Education\Presenters\EducationPresenter;
use Modules\CoreUser\Education\Requests\CreateEducationRequest;
use Modules\CoreUser\Education\Requests\DeleteEducationRequest;
use Modules\CoreUser\Education\Requests\GetEducationListRequest;
use Modules\CoreUser\Education\Requests\GetEducationRequest;
use Modules\CoreUser\Education\Requests\UpdateEducationRequest;
use Modules\CoreUser\Education\Services\EducationCRUDService;
use Ramsey\Uuid\Uuid;

class EducationController extends Controller
{
    public function __construct(
        private EducationCRUDService $educationService,
        private UpdateEducationHandler $updateEducationHandler,
        private DeleteEducationHandler $deleteEducationHandler,
    ) {
    }

    public function index(GetEducationListRequest $request): JsonResponse
    {
        $userId = Uuid::fromString(auth('api_user')->user()->id);
        $list = $this->educationService->list(
            $userId ,
            (int) $request->get('page', 1),
            (int) $request->get('per_page', 10)
        );

        return Json::items(EducationPresenter::collection($list['data']), paginationSettings: $list['pagination']);
    }

    public function show(GetEducationRequest $request): JsonResponse
    {
        $item = $this->educationService->get(Uuid::fromString($request->route('id')));

        $presenter = new EducationPresenter($item);

        return Json::item($presenter->getData());
    }

    public function store(CreateEducationRequest $request): JsonResponse
    {
        $createdItem = $this->educationService->create($request->createCreateEducationDTO());

        $presenter = new EducationPresenter($createdItem);

        return Json::item($presenter->getData());
    }

    public function update(UpdateEducationRequest $request): JsonResponse
    {
        $command = $request->createUpdateEducationCommand();
        $this->updateEducationHandler->handle($command);

        $item = $this->educationService->get($command->getId());

        $presenter = new EducationPresenter($item);

        return Json::item( $presenter->getData());
    }

    public function delete(DeleteEducationRequest $request): JsonResponse
    {
        $this->deleteEducationHandler->handle(Uuid::fromString($request->route('id')));

        return Json::deleted();
    }
}

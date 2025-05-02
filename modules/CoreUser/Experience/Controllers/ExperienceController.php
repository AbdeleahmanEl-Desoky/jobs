<?php

declare(strict_types=1);

namespace Modules\CoreUser\Experience\Controllers;

use App\Presenters\Json;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\CoreUser\Experience\Handlers\DeleteExperienceHandler;
use Modules\CoreUser\Experience\Handlers\UpdateExperienceHandler;
use Modules\CoreUser\Experience\Presenters\ExperiencePresenter;
use Modules\CoreUser\Experience\Requests\CreateExperienceRequest;
use Modules\CoreUser\Experience\Requests\DeleteExperienceRequest;
use Modules\CoreUser\Experience\Requests\GetExperienceListRequest;
use Modules\CoreUser\Experience\Requests\GetExperienceRequest;
use Modules\CoreUser\Experience\Requests\UpdateExperienceRequest;
use Modules\CoreUser\Experience\Services\ExperienceCRUDService;
use Ramsey\Uuid\Uuid;

class ExperienceController extends Controller
{
    public function __construct(
        private ExperienceCRUDService $experienceService,
        private UpdateExperienceHandler $updateExperienceHandler,
        private DeleteExperienceHandler $deleteExperienceHandler,
    ) {
    }

    public function index(GetExperienceListRequest $request): JsonResponse
    {
        $userId = Uuid::fromString(auth('api_user')->user()->id);

        $list = $this->experienceService->list(
            $userId,
            (int) $request->get('page', 1),
            (int) $request->get('per_page', 10)
        );

        return Json::items(ExperiencePresenter::collection($list['data']), paginationSettings: $list['pagination']);
    }

    public function show(GetExperienceRequest $request): JsonResponse
    {
        $item = $this->experienceService->get(Uuid::fromString($request->route('id')));

        $presenter = new ExperiencePresenter($item);

        return Json::item($presenter->getData());
    }

    public function store(CreateExperienceRequest $request): JsonResponse
    {
        $createdItem = $this->experienceService->create($request->createCreateExperienceDTO());

        $presenter = new ExperiencePresenter($createdItem);

        return Json::item($presenter->getData());
    }

    public function update(UpdateExperienceRequest $request): JsonResponse
    {
        $command = $request->createUpdateExperienceCommand();
        $this->updateExperienceHandler->handle($command);

        $item = $this->experienceService->get($command->getId());

        $presenter = new ExperiencePresenter($item);

        return Json::item( $presenter->getData());
    }

    public function delete(DeleteExperienceRequest $request): JsonResponse
    {
        $this->deleteExperienceHandler->handle(Uuid::fromString($request->route('id')));

        return Json::deleted();
    }
}

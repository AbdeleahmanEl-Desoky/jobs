<?php

declare(strict_types=1);

namespace Modules\Shared\Skill\Controllers;

use App\Presenters\Json;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Shared\Skill\Handlers\DeleteSkillHandler;
use Modules\Shared\Skill\Handlers\UpdateSkillHandler;
use Modules\Shared\Skill\Presenters\SkillPresenter;
use Modules\Shared\Skill\Requests\CreateSkillRequest;
use Modules\Shared\Skill\Requests\DeleteSkillRequest;
use Modules\Shared\Skill\Requests\GetSkillListRequest;
use Modules\Shared\Skill\Requests\GetSkillRequest;
use Modules\Shared\Skill\Requests\UpdateSkillRequest;
use Modules\Shared\Skill\Services\SkillCRUDService;
use Ramsey\Uuid\Uuid;

class SkillController extends Controller
{
    public function __construct(
        private SkillCRUDService $skillService,
        private UpdateSkillHandler $updateSkillHandler,
        private DeleteSkillHandler $deleteSkillHandler,
    ) {
    }

    public function index(GetSkillListRequest $request): JsonResponse
    {
        $list = $this->skillService->list(
            (int) $request->get('page', 1),
            (int) $request->get('per_page', 10)
        );

        return Json::items(SkillPresenter::collection($list['data']), paginationSettings: $list['pagination']);
    }

    public function show(GetSkillRequest $request): JsonResponse
    {
        $item = $this->skillService->get(Uuid::fromString($request->route('id')));

        $presenter = new SkillPresenter($item);

        return Json::item($presenter->getData());
    }

    public function store(CreateSkillRequest $request): JsonResponse
    {
        $createdItem = $this->skillService->create($request->createCreateSkillDTO());

        $presenter = new SkillPresenter($createdItem);

        return Json::item($presenter->getData());
    }

    public function update(UpdateSkillRequest $request): JsonResponse
    {
        $command = $request->createUpdateSkillCommand();
        $this->updateSkillHandler->handle($command);

        $item = $this->skillService->get($command->getId());

        $presenter = new SkillPresenter($item);

        return Json::item( $presenter->getData());
    }

    public function delete(DeleteSkillRequest $request): JsonResponse
    {
        $this->deleteSkillHandler->handle(Uuid::fromString($request->route('id')));

        return Json::deleted();
    }
}

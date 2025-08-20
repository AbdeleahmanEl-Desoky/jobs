<?php

declare(strict_types=1);

namespace Modules\CoreUser\UserSkill\Controllers;

use App\Presenters\Json;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\CoreUser\UserSkill\Handlers\DeleteSkillHandler;
use Modules\CoreUser\UserSkill\Handlers\UpdateSkillHandler;
use Modules\CoreUser\UserSkill\Presenters\SkillPresenter;
use Modules\CoreUser\UserSkill\Requests\CreateSkillRequest;
use Modules\CoreUser\UserSkill\Requests\DeleteSkillRequest;
use Modules\CoreUser\UserSkill\Requests\GetSkillListRequest;
use Modules\CoreUser\UserSkill\Requests\GetSkillRequest;
use Modules\CoreUser\UserSkill\Requests\UpdateSkillRequest;
use Modules\CoreUser\UserSkill\Services\SkillCRUDService;
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

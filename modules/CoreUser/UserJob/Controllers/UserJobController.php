<?php

declare(strict_types=1);

namespace Modules\CoreUser\UserJob\Controllers;

use App\Presenters\Json;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\CoreUser\UserJob\Handlers\ArchiveJobHandler;
use Modules\CoreUser\UserJob\Handlers\SaveJobHandler;
use Modules\CoreUser\UserJob\Presenters\UserJobIndexPresenter;
use Modules\CoreUser\UserJob\Presenters\UserJobPresenter;
use Modules\CoreUser\UserJob\Requests\ArchiveJobRequest;
use Modules\CoreUser\UserJob\Requests\GetUserJobListRequest;
use Modules\CoreUser\UserJob\Requests\GetUserJobRequest;
use Modules\CoreUser\UserJob\Requests\SavedJobRequest;
use Modules\CoreUser\UserJob\Services\UserJobCRUDService;
use Ramsey\Uuid\Uuid;

class UserJobController extends Controller
{
    public function __construct(
        private UserJobCRUDService $userJobService,
        private ArchiveJobHandler $archiveJobHandler,
        private SaveJobHandler $saveJobHandler
    ) {
    }

    public function index(GetUserJobListRequest $request): JsonResponse
    {
        $list = $this->userJobService->list(
            (int) $request->get('page', 1),
            (int) $request->get('per_page', 10)
        );

        return Json::items(UserJobIndexPresenter::collection($list['data']), paginationSettings: $list['pagination']);
    }

    public function show(GetUserJobRequest $request): JsonResponse
    {
        $item = $this->userJobService->get(Uuid::fromString($request->route('id')));

        $presenter = new UserJobPresenter($item);

        return Json::item($presenter->getData());
    }
    public function archive(ArchiveJobRequest $request): JsonResponse
    {
        $command = $request->createArchiveApplyJobCommand();
        $this->archiveJobHandler->handle($command);

        $item = $this->userJobService->get($command->getId());
        $presenter = new UserJobPresenter($item);

        return Json::item($presenter->getData(), message: 'Job archived successfully.');
    }
    public function save(SavedJobRequest $request): JsonResponse
    {
        $command = $request->createSaveJobCommand();
        $this->saveJobHandler->handle($command);

        $item = $this->userJobService->get($command->getId());
        $presenter = new UserJobPresenter($item);

        return Json::item($presenter->getData(), message: 'Job archived successfully.');
    }
}

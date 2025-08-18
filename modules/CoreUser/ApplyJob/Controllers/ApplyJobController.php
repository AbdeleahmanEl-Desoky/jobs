<?php

declare(strict_types=1);

namespace Modules\CoreUser\ApplyJob\Controllers;

use App\Presenters\Json;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\CoreUser\ApplyJob\Handlers\ArchiveApplyJobHandler;
use Modules\CoreUser\ApplyJob\Handlers\DeleteApplyJobHandler;
use Modules\CoreUser\ApplyJob\Handlers\UpdateApplyJobHandler;
use Modules\CoreUser\ApplyJob\Presenters\ApplyJobPresenter;
use Modules\CoreUser\ApplyJob\Requests\ArchiveApplyJobRequest;
use Modules\CoreUser\ApplyJob\Requests\CreateApplyJobRequest;
use Modules\CoreUser\ApplyJob\Requests\DeleteApplyJobRequest;
use Modules\CoreUser\ApplyJob\Requests\GetApplyJobListRequest;
use Modules\CoreUser\ApplyJob\Requests\GetApplyJobRequest;
use Modules\CoreUser\ApplyJob\Requests\UpdateApplyJobRequest;
use Modules\CoreUser\ApplyJob\Services\ApplyJobCRUDService;
use Ramsey\Uuid\Uuid;

class ApplyJobController extends Controller
{
    public function __construct(
        private ApplyJobCRUDService $applyJobService,
        private UpdateApplyJobHandler $updateApplyJobHandler,
        private DeleteApplyJobHandler $deleteApplyJobHandler,
        private ArchiveApplyJobHandler $archiveApplyJobHandler,
    ) {
    }

    public function index(GetApplyJobListRequest $request): JsonResponse
    {
        $list = $this->applyJobService->list(
            (int) $request->get('page', 1),
            (int) $request->get('per_page', 10)
        );

        return Json::items(ApplyJobPresenter::collection($list['data']), paginationSettings: $list['pagination']);
    }

    public function show(GetApplyJobRequest $request): JsonResponse
    {
        $item = $this->applyJobService->get(Uuid::fromString($request->route('id')));

        $presenter = new ApplyJobPresenter($item);

        return Json::item($presenter->getData());
    }

    public function store(CreateApplyJobRequest $request): JsonResponse
    {
        $createdItem = $this->applyJobService->create($request->createCreateApplyJobDTO());

        $presenter = new ApplyJobPresenter($createdItem);

        return Json::item($presenter->getData());
    }

    public function update(UpdateApplyJobRequest $request): JsonResponse
    {
        $command = $request->createUpdateApplyJobCommand();
        $this->updateApplyJobHandler->handle($command);

        $item = $this->applyJobService->get($command->getId());

        $presenter = new ApplyJobPresenter($item);

        return Json::item( $presenter->getData());
    }

    public function delete(DeleteApplyJobRequest $request): JsonResponse
    {
        $this->deleteApplyJobHandler->handle(Uuid::fromString($request->route('id')));

        return Json::deleted();
    }

    /**
     * Archive an ApplyJob record.
     */
    public function archive(ArchiveApplyJobRequest $request): JsonResponse
    {
        $command = $request->createArchiveApplyJobCommand();
        $this->archiveApplyJobHandler->handle($command);

        $item = $this->applyJobService->get($command->getId());
        $presenter = new ApplyJobPresenter($item);

        return Json::item($presenter->getData(), message: 'ApplyJob archived successfully.');
    }
}

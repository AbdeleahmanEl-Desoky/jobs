<?php

declare(strict_types=1);

namespace Modules\Shared\JobTitle\Controllers;

use App\Presenters\Json;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Shared\JobTitle\Handlers\DeleteJobTitleHandler;
use Modules\Shared\JobTitle\Handlers\UpdateJobTitleHandler;
use Modules\Shared\JobTitle\Presenters\JobTitlePresenter;
use Modules\Shared\JobTitle\Requests\CreateJobTitleRequest;
use Modules\Shared\JobTitle\Requests\DeleteJobTitleRequest;
use Modules\Shared\JobTitle\Requests\GetJobTitleListRequest;
use Modules\Shared\JobTitle\Requests\GetJobTitleRequest;
use Modules\Shared\JobTitle\Requests\UpdateJobTitleRequest;
use Modules\Shared\JobTitle\Services\JobTitleCRUDService;
use Ramsey\Uuid\Uuid;

class JobTitleController extends Controller
{
    public function __construct(
        private JobTitleCRUDService $jobTitleService,
        private UpdateJobTitleHandler $updateJobTitleHandler,
        private DeleteJobTitleHandler $deleteJobTitleHandler,
    ) {
    }

    public function index(GetJobTitleListRequest $request): JsonResponse
    {
        $list = $this->jobTitleService->list(
            (int) $request->get('page', 1),
            (int) $request->get('per_page', 10)
        );

        return Json::items(JobTitlePresenter::collection($list['data']), paginationSettings: $list['pagination']);
    }

    public function show(GetJobTitleRequest $request): JsonResponse
    {
        $item = $this->jobTitleService->get(Uuid::fromString($request->route('id')));

        $presenter = new JobTitlePresenter($item);

        return Json::item($presenter->getData());
    }

    public function store(CreateJobTitleRequest $request): JsonResponse
    {
        $createdItem = $this->jobTitleService->create($request->createCreateJobTitleDTO());

        $presenter = new JobTitlePresenter($createdItem);

        return Json::item($presenter->getData());
    }

    public function update(UpdateJobTitleRequest $request): JsonResponse
    {
        $command = $request->createUpdateJobTitleCommand();
        $this->updateJobTitleHandler->handle($command);

        $item = $this->jobTitleService->get($command->getId());

        $presenter = new JobTitlePresenter($item);

        return Json::item( $presenter->getData());
    }

    public function delete(DeleteJobTitleRequest $request): JsonResponse
    {
        $this->deleteJobTitleHandler->handle(Uuid::fromString($request->route('id')));

        return Json::deleted();
    }
}

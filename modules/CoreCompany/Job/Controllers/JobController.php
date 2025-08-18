<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Job\Controllers;

use App\Presenters\Json;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\CoreCompany\Job\Handlers\DeleteJobHandler;
use Modules\CoreCompany\Job\Handlers\UpdateJobHandler;
use Modules\CoreCompany\Job\Presenters\JobIndexPresenter;
use Modules\CoreCompany\Job\Presenters\JobPresenter;
use Modules\CoreCompany\Job\Requests\CreateJobRequest;
use Modules\CoreCompany\Job\Requests\DeleteJobRequest;
use Modules\CoreCompany\Job\Requests\GetJobListRequest;
use Modules\CoreCompany\Job\Requests\GetJobRequest;
use Modules\CoreCompany\Job\Requests\UpdateJobRequest;
use Modules\CoreCompany\Job\Services\JobCRUDService;
use Ramsey\Uuid\Uuid;

class JobController extends Controller
{
    public function __construct(
        private JobCRUDService $jobService,
        private UpdateJobHandler $updateJobHandler,
        private DeleteJobHandler $deleteJobHandler,
    ) {
    }

    public function index(GetJobListRequest $request): JsonResponse
    {
        $list = $this->jobService->list(
            (int) $request->get('page', 1),
            (int) $request->get('per_page', 10)
        );

        return Json::items(JobIndexPresenter::collection($list['data']), paginationSettings: $list['pagination']);
    }

    public function show(GetJobRequest $request): JsonResponse
    {
        $item = $this->jobService->get(Uuid::fromString($request->route('id')));

        $presenter = new JobPresenter($item);

        return Json::item($presenter->getData());
    }

    public function store(CreateJobRequest $request): JsonResponse
    {
        $createdItem = $this->jobService->create($request->createCreateJobDTO());

        $presenter = new JobPresenter($createdItem);

        return Json::item($presenter->getData());
    }

    public function update(UpdateJobRequest $request): JsonResponse
    {
        $command = $request->createUpdateJobCommand();
        $this->updateJobHandler->handle($command);

        $item = $this->jobService->get($command->getId());

        $presenter = new JobPresenter($item);

        return Json::item( $presenter->getData());
    }

    public function delete(DeleteJobRequest $request): JsonResponse
    {
        $this->deleteJobHandler->handle(Uuid::fromString($request->route('id')));

        return Json::deleted();
    }
}

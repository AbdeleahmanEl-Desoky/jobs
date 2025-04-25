<?php

declare(strict_types=1);

namespace Modules\Shared\CompanySize\Controllers;

use App\Presenters\Json;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Shared\CompanySize\Handlers\DeleteCompanySizeHandler;
use Modules\Shared\CompanySize\Handlers\UpdateCompanySizeHandler;
use Modules\Shared\CompanySize\Presenters\CompanySizePresenter;
use Modules\Shared\CompanySize\Requests\CreateCompanySizeRequest;
use Modules\Shared\CompanySize\Requests\DeleteCompanySizeRequest;
use Modules\Shared\CompanySize\Requests\GetCompanySizeListRequest;
use Modules\Shared\CompanySize\Requests\GetCompanySizeRequest;
use Modules\Shared\CompanySize\Requests\UpdateCompanySizeRequest;
use Modules\Shared\CompanySize\Services\CompanySizeCRUDService;
use Ramsey\Uuid\Uuid;

class CompanySizeController extends Controller
{
    public function __construct(
        private CompanySizeCRUDService $companySizeService,
        private UpdateCompanySizeHandler $updateCompanySizeHandler,
        private DeleteCompanySizeHandler $deleteCompanySizeHandler,
    ) {
    }

    public function index(GetCompanySizeListRequest $request): JsonResponse
    {
        $list = $this->companySizeService->list(
            (int) $request->get('page', 1),
            (int) $request->get('per_page', 10)
        );

        return Json::items(CompanySizePresenter::collection($list['data']), paginationSettings: $list['pagination']);
    }

    public function show(GetCompanySizeRequest $request): JsonResponse
    {
        $item = $this->companySizeService->get(Uuid::fromString($request->route('id')));

        $presenter = new CompanySizePresenter($item);

        return Json::item($presenter->getData());
    }

    public function store(CreateCompanySizeRequest $request): JsonResponse
    {
        $createdItem = $this->companySizeService->create($request->createCreateCompanySizeDTO());

        $presenter = new CompanySizePresenter($createdItem);

        return Json::item($presenter->getData());
    }

    public function update(UpdateCompanySizeRequest $request): JsonResponse
    {
        $command = $request->createUpdateCompanySizeCommand();
        $this->updateCompanySizeHandler->handle($command);

        $item = $this->companySizeService->get($command->getId());

        $presenter = new CompanySizePresenter($item);

        return Json::item( $presenter->getData());
    }

    public function delete(DeleteCompanySizeRequest $request): JsonResponse
    {
        $this->deleteCompanySizeHandler->handle(Uuid::fromString($request->route('id')));

        return Json::deleted();
    }
}

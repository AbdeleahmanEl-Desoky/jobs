<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Company\Controllers;

use App\Presenters\Json;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\CoreCompany\Company\Handlers\DeleteCompanyHandler;
use Modules\CoreCompany\Company\Handlers\UpdateCompanyHandler;
use Modules\CoreCompany\Company\Presenters\CompanyPresenter;
use Modules\CoreCompany\Company\Requests\CreateCompanyRequest;
use Modules\CoreCompany\Company\Requests\DeleteCompanyRequest;
use Modules\CoreCompany\Company\Requests\GetCompanyListRequest;
use Modules\CoreCompany\Company\Requests\GetCompanyRequest;
use Modules\CoreCompany\Company\Requests\UpdateCompanyRequest;
use Modules\CoreCompany\Company\Services\CompanyCRUDService;
use Modules\CoreCompany\Company\Services\CompanyUploadFileService;
use Ramsey\Uuid\Uuid;

class CompanyController extends Controller
{
    public function __construct(
        private CompanyCRUDService $companyService,
        private UpdateCompanyHandler $updateCompanyHandler,
        private DeleteCompanyHandler $deleteCompanyHandler,
        private CompanyUploadFileService $companyUploadFileService
    ) {
    }

    public function index(GetCompanyListRequest $request): JsonResponse
    {
        $list = $this->companyService->list(
            (int) $request->get('page', 1),
            (int) $request->get('per_page', 10)
        );

        return Json::items(CompanyPresenter::collection($list['data']), paginationSettings: $list['pagination']);
    }

    public function show(GetCompanyRequest $request): JsonResponse
    {
        $item = $this->companyService->get(Uuid::fromString($request->route('id')));

        $presenter = new CompanyPresenter($item);

        return Json::item($presenter->getData());
    }

    public function update(UpdateCompanyRequest $request): JsonResponse
    {
        $updateCompanyCommand = $request->createUpdateCompanyCommand();
        $this->updateCompanyHandler->handle($updateCompanyCommand);

        $item = $this->companyService->get($updateCompanyCommand->getId());

        $this->companyUploadFileService->uploadProfile($updateCompanyCommand);

        $presenter = new CompanyPresenter($item);

        return Json::item( $presenter->getData());
    }

    // public function delete(DeleteCompanyRequest $request): JsonResponse
    // {
    //     $this->deleteCompanyHandler->handle(Uuid::fromString($request->route('id')));

    //     return Json::deleted();
    // }
}

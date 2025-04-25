<?php

declare(strict_types=1);

namespace Modules\Shared\City\Controllers;

use App\Presenters\Json;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Shared\City\Handlers\DeleteCityHandler;
use Modules\Shared\City\Handlers\UpdateCityHandler;
use Modules\Shared\City\Presenters\CityPresenter;
use Modules\Shared\City\Requests\CreateCityRequest;
use Modules\Shared\City\Requests\DeleteCityRequest;
use Modules\Shared\City\Requests\GetCityListRequest;
use Modules\Shared\City\Requests\GetCityRequest;
use Modules\Shared\City\Requests\UpdateCityRequest;
use Modules\Shared\City\Services\CityCRUDService;
use Ramsey\Uuid\Uuid;

class CityController extends Controller
{
    public function __construct(
        private CityCRUDService $cityService,
        private UpdateCityHandler $updateCityHandler,
        private DeleteCityHandler $deleteCityHandler,
    ) {
    }

    public function index(GetCityListRequest $request): JsonResponse
    {
        $list = $this->cityService->list(
            (int) $request->get('page', 1),
            (int) $request->get('per_page', 10)
        );

        return Json::items(CityPresenter::collection($list['data']), paginationSettings: $list['pagination']);
    }

    public function show(GetCityRequest $request): JsonResponse
    {
        $item = $this->cityService->get(Uuid::fromString($request->route('id')));

        $presenter = new CityPresenter($item);

        return Json::item($presenter->getData());
    }

    public function store(CreateCityRequest $request): JsonResponse
    {
        $createdItem = $this->cityService->create($request->createCreateCityDTO());

        $presenter = new CityPresenter($createdItem);

        return Json::item($presenter->getData());
    }

    public function update(UpdateCityRequest $request): JsonResponse
    {
        $command = $request->createUpdateCityCommand();
        $this->updateCityHandler->handle($command);

        $item = $this->cityService->get($command->getId());

        $presenter = new CityPresenter($item);

        return Json::item( $presenter->getData());
    }

    public function delete(DeleteCityRequest $request): JsonResponse
    {
        $this->deleteCityHandler->handle(Uuid::fromString($request->route('id')));

        return Json::deleted();
    }
}

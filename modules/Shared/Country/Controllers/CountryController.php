<?php

declare(strict_types=1);

namespace Modules\Shared\Country\Controllers;

use App\Presenters\Json;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Shared\Country\Handlers\DeleteCountryHandler;
use Modules\Shared\Country\Handlers\UpdateCountryHandler;
use Modules\Shared\Country\Presenters\CountryPresenter;
use Modules\Shared\Country\Requests\CreateCountryRequest;
use Modules\Shared\Country\Requests\DeleteCountryRequest;
use Modules\Shared\Country\Requests\GetCountryListRequest;
use Modules\Shared\Country\Requests\GetCountryRequest;
use Modules\Shared\Country\Requests\UpdateCountryRequest;
use Modules\Shared\Country\Services\CountryCRUDService;
use Ramsey\Uuid\Uuid;

class CountryController extends Controller
{
    public function __construct(
        private CountryCRUDService $countryService,
        private UpdateCountryHandler $updateCountryHandler,
        private DeleteCountryHandler $deleteCountryHandler,
    ) {
    }

    public function index(GetCountryListRequest $request): JsonResponse
    {
        $list = $this->countryService->list(
            (int) $request->get('page', 1),
            (int) $request->get('per_page', 10)
        );

        return Json::items(CountryPresenter::collection($list['data']), paginationSettings: $list['pagination']);
    }

    public function show(GetCountryRequest $request): JsonResponse
    {
        $item = $this->countryService->get(Uuid::fromString($request->route('id')));

        $presenter = new CountryPresenter($item);

        return Json::item($presenter->getData());
    }

    public function store(CreateCountryRequest $request): JsonResponse
    {
        $createdItem = $this->countryService->create($request->createCreateCountryDTO());

        $presenter = new CountryPresenter($createdItem);

        return Json::item($presenter->getData());
    }

    public function update(UpdateCountryRequest $request): JsonResponse
    {
        $command = $request->createUpdateCountryCommand();
        $this->updateCountryHandler->handle($command);

        $item = $this->countryService->get($command->getId());

        $presenter = new CountryPresenter($item);

        return Json::item( $presenter->getData());
    }

    public function delete(DeleteCountryRequest $request): JsonResponse
    {
        $this->deleteCountryHandler->handle(Uuid::fromString($request->route('id')));

        return Json::deleted();
    }
}

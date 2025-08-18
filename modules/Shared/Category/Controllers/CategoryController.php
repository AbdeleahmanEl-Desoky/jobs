<?php

declare(strict_types=1);

namespace Modules\Shared\Category\Controllers;

use App\Presenters\Json;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Shared\Category\Handlers\DeleteCategoryHandler;
use Modules\Shared\Category\Handlers\UpdateCategoryHandler;
use Modules\Shared\Category\Presenters\CategoryPresenter;
use Modules\Shared\Category\Requests\CreateCategoryRequest;
use Modules\Shared\Category\Requests\DeleteCategoryRequest;
use Modules\Shared\Category\Requests\GetCategoryListRequest;
use Modules\Shared\Category\Requests\GetCategoryRequest;
use Modules\Shared\Category\Requests\UpdateCategoryRequest;
use Modules\Shared\Category\Services\CategoryCRUDService;
use Ramsey\Uuid\Uuid;

class CategoryController extends Controller
{
    public function __construct(
        private CategoryCRUDService $categoryService,
        private UpdateCategoryHandler $updateCategoryHandler,
        private DeleteCategoryHandler $deleteCategoryHandler,
    ) {
    }

    public function index(GetCategoryListRequest $request): JsonResponse
    {
        $list = $this->categoryService->list(
            (int) $request->get('page', 1),
            (int) $request->get('per_page', 10)
        );

        return Json::items(CategoryPresenter::collection($list['data']), paginationSettings: $list['pagination']);
    }

    public function show(GetCategoryRequest $request): JsonResponse
    {
        $item = $this->categoryService->get(Uuid::fromString($request->route('id')));

        $presenter = new CategoryPresenter($item);

        return Json::item($presenter->getData());
    }

    public function store(CreateCategoryRequest $request): JsonResponse
    {
        $createdItem = $this->categoryService->create($request->createCreateCategoryDTO());

        $presenter = new CategoryPresenter($createdItem);

        return Json::item($presenter->getData());
    }

    public function update(UpdateCategoryRequest $request): JsonResponse
    {
        $command = $request->createUpdateCategoryCommand();
        $this->updateCategoryHandler->handle($command);

        $item = $this->categoryService->get($command->getId());

        $presenter = new CategoryPresenter($item);

        return Json::item( $presenter->getData());
    }

    public function delete(DeleteCategoryRequest $request): JsonResponse
    {
        $this->deleteCategoryHandler->handle(Uuid::fromString($request->route('id')));

        return Json::deleted();
    }
}

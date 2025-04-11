<?php

declare(strict_types=1);

namespace Modules\CoreUser\User\Controllers;

use App\Presenters\Json;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\CoreUser\User\Handlers\DeleteUserHandler;
use Modules\CoreUser\User\Handlers\UpdateUserHandler;
use Modules\CoreUser\User\Presenters\UserPresenter;
use Modules\CoreUser\User\Requests\CreateUserRequest;
use Modules\CoreUser\User\Requests\DeleteUserRequest;
use Modules\CoreUser\User\Requests\GetUserListRequest;
use Modules\CoreUser\User\Requests\GetUserRequest;
use Modules\CoreUser\User\Requests\UpdateUserRequest;
use Modules\CoreUser\User\Services\UserCRUDService;
use Ramsey\Uuid\Uuid;

class UserController extends Controller
{
    public function __construct(
        private UserCRUDService $userService,
        private UpdateUserHandler $updateUserHandler,
        private DeleteUserHandler $deleteUserHandler,
    ) {
    }

    public function index(GetUserListRequest $request): JsonResponse
    {
        $list = $this->userService->list(
            (int) $request->get('page', 1),
            (int) $request->get('per_page', 10)
        );

        return Json::items(UserPresenter::collection($list['data']), paginationSettings: $list['pagination']);
    }

    public function show(GetUserRequest $request): JsonResponse
    {
        $item = $this->userService->get(Uuid::fromString($request->route('id')));

        $presenter = new UserPresenter($item);

        return Json::item($presenter->getData());
    }

    public function store(CreateUserRequest $request): JsonResponse
    {
        $createdItem = $this->userService->create($request->createCreateUserDTO());

        $presenter = new UserPresenter($createdItem);

        return Json::item($presenter->getData());
    }

    public function update(UpdateUserRequest $request): JsonResponse
    {
        $command = $request->createUpdateUserCommand();
        $this->updateUserHandler->handle($command);

        $item = $this->userService->get($command->getId());

        $presenter = new UserPresenter($item);

        return Json::item( $presenter->getData());
    }

    public function delete(DeleteUserRequest $request): JsonResponse
    {
        $this->deleteUserHandler->handle(Uuid::fromString($request->route('id')));

        return Json::deleted();
    }
}

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
use Modules\CoreUser\User\Requests\UpdateCvUserRequest;
use Modules\CoreUser\User\Requests\UpdateUserRequest;
use Modules\CoreUser\User\Services\UserCRUDService;
use Modules\CoreUser\User\Services\UserUploadFileService;
use Ramsey\Uuid\Uuid;

class UserController extends Controller
{
    public function __construct(
        private UserCRUDService $userService,
        private UpdateUserHandler $updateUserHandler,
        private DeleteUserHandler $deleteUserHandler,
        private UserUploadFileService $userUploadFileService
    ) {
    }

    public function show(GetUserRequest $request): JsonResponse
    {
        $item = $this->userService->get(Uuid::fromString(auth('api_user')->user()->id));

        $presenter = new UserPresenter($item);

        return Json::item($presenter->getData());
    }

    public function uploadCv(UpdateCvUserRequest $request)
    {
        $updateCvUserCommand = $request->createUpdateCvUserCommand();

        $this->userUploadFileService->uploadCv($updateCvUserCommand);

        return Json::done('SUCCESS_WITHOUT_PAYLOAD');
    }

    public function update(UpdateUserRequest $request): JsonResponse
    {
        $updateUserCommand = $request->createUpdateUserCommand();
        $this->updateUserHandler->handle($updateUserCommand);

        $item = $this->userService->get($updateUserCommand->getId());

        $this->userUploadFileService->uploadProfile($updateUserCommand);

        $presenter = new UserPresenter($item);

        return Json::item( $presenter->getData());
    }

    // public function delete(DeleteUserRequest $request): JsonResponse
    // {
    //     $this->deleteUserHandler->handle(Uuid::fromString($request->route('id')));

    //     return Json::deleted();
    // }
}

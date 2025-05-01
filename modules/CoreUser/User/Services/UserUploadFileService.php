<?php

declare(strict_types=1);

namespace Modules\CoreUser\User\Services;

use Illuminate\Support\Collection;
use Modules\CoreUser\User\Commands\UpdateCvUserCommand;
use Modules\CoreUser\User\Commands\UpdateUserCommand;
use Modules\CoreUser\User\DTO\CreateUserDTO;
use Modules\CoreUser\User\Models\User;
use Modules\CoreUser\User\Repositories\UserRepository;
use Ramsey\Uuid\UuidInterface;

class UserUploadFileService
{
    public function __construct(
        private UserRepository $repository,
    ) {
    }

    public function uploadCv(UpdateCvUserCommand $updateCvUserCommand)
    {
        $user = $this->repository->getUser($updateCvUserCommand->getId());

        $file = $updateCvUserCommand->getFile();

       return $media = $user->addMedia($file)->toMediaCollection('user_cv');
    }

    public function uploadProfile(UpdateUserCommand $updateUserCommand)
    {
        $user = $this->repository->getUser($updateUserCommand->getId());

        $file = $updateUserCommand->getFile();
        if($file){
            $user->clearMediaCollection('user_profile');
            $media = $user->addMedia($file)->toMediaCollection('user_profile');
            return true;
        }
        return false;

    }

}

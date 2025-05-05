<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Company\Services;

use Illuminate\Support\Collection;
use Modules\CoreCompany\Company\Commands\UpdateCompanyCommand;
use Modules\CoreCompany\Company\DTO\CreateCompanyDTO;
use Modules\CoreCompany\Company\Models\Company;
use Modules\CoreCompany\Company\Repositories\CompanyRepository;
use Ramsey\Uuid\UuidInterface;

class CompanyUploadFileService
{
    public function __construct(
        private CompanyRepository $repository,
    ) {
    }
    public function uploadProfile(UpdateCompanyCommand $updateUserCommand)
    {
        $user = $this->repository->getCompany($updateUserCommand->getId());

        $file = $updateUserCommand->getFile();
        if($file){
            $user->clearMediaCollection('company_profile');
            $media = $user->addMedia($file)->toMediaCollection('company_profile');
            return true;
        }
        return false;

    }
}

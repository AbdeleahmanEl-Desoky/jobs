<?php

declare(strict_types=1);

namespace Modules\Shared\Media\Controllers;

use App\Presenters\Json;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Shared\Media\Handlers\DeleteMediaHandler;
use Modules\Shared\Media\Requests\DeleteMediaRequest;
use Ramsey\Uuid\Uuid;

class MediaController extends Controller
{
    public function __construct(
        private DeleteMediaHandler $deleteMediaHandler,
    ) {
    }

    public function delete(DeleteMediaRequest $request): JsonResponse
    {
        $this->deleteMediaHandler->handle(Uuid::fromString($request->route('id')));

        return Json::deleted();
    }
}

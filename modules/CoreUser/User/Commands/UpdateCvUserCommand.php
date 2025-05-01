<?php

declare(strict_types=1);

namespace Modules\CoreUser\User\Commands;

use Ramsey\Uuid\UuidInterface;
use Illuminate\Http\UploadedFile;

class UpdateCvUserCommand
{
    public function __construct(
        private UuidInterface $id,
        private UploadedFile $file,
    ) {
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function getFile(): UploadedFile
    {
        return $this->file;
    }

    public function toArray(): array
    {
        return array_filter([
            'file' => $this->file->getClientOriginalName(),
        ]);
    }
}

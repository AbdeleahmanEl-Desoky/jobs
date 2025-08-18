<?php

declare(strict_types=1);

namespace Modules\CoreUser\Archived\Models;

use BasePackage\Shared\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Archived extends Model
{
    use HasFactory;
    use UuidTrait;

    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'archived';

    protected $fillable = [
        'archivable_id',
        'archivable_type',
        'user_id',
        'reason',
        'archived_at',
    ];

    protected $casts = [
        'id' => 'string',
        'archived_at' => 'datetime',
    ];

    public function archivable(): MorphTo
    {
        return $this->morphTo();
    }
}
